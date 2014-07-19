# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

$build_script = <<SCRIPT
apt-get update

echo Installing HHVM dependencies...
apt-get install -y git-core cmake g++ libmysqlclient-dev \
  libxml2-dev libmcrypt-dev libicu-dev openssl build-essential binutils-dev \
  libcap-dev libgd2-xpm-dev zlib1g-dev libtbb-dev libonig-dev libpcre3-dev \
  autoconf automake libtool libcurl4-openssl-dev \
  wget memcached libreadline-dev libncurses-dev libmemcached-dev libbz2-dev \
  libc-client2007e-dev php5-mcrypt php5-imagick libgoogle-perftools-dev \
  libcloog-ppl0 libelf-dev libdwarf-dev subversion python-software-properties \
  libmagickwand-dev libxslt1-dev ocaml-native-compilers libevent-dev

echo Upgrading gcc to 4.8
add-apt-repository ppa:ubuntu-toolchain-r/test
apt-get update
apt-get install -y gcc-4.8 g++-4.8
update-alternatives --install /usr/bin/gcc gcc /usr/bin/gcc-4.8 60 \
                    --slave /usr/bin/g++ g++ /usr/bin/g++-4.8
update-alternatives --install /usr/bin/gcc gcc /usr/bin/gcc-4.6 40 \
                    --slave /usr/bin/g++ g++ /usr/bin/g++-4.6
update-alternatives --set gcc /usr/bin/gcc-4.8

echo Installing Boost 1.49
add-apt-repository ppa:mapnik/boost
apt-get update
apt-get install -y libboost1.49-dev libboost-regex1.49-dev \
  libboost-system1.49-dev libboost-program-options1.49-dev \
  libboost-filesystem1.49-dev libboost-thread1.49-dev

echo Installing nginx, php and other useful tools...
apt-get install -y nginx-full \
  php5-cli php5-curl php5-fpm php5-gd php5-intl php5-json \
  php5-memcached php5-mysql php5-tidy php5-xsl php-apc \
  unzip apache2-utils
cp -R /vagrant/etc/* /etc/
chmod +x /etc/init.d/hhvm
mv /etc/php5/fpm/pool.d/www.conf /etc/php5/fpm/pool.d/www.conf.dist

echo Installing MySQL server
debconf-set-selections <<< 'mysql-server mysql-server/root_password password vagrant'
debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password vagrant'
apt-get update -y
apt-get -y install mysql-server

#echo Creating database schema
mysql -u root -pvagrant -e "CREATE DATABASE ragnarok"
mysql -u root -pvagrant ragnarok < /vagrant/etc/database.sql

echo Creating MySQL user ragnarok
mysql -u root -pvagrant -e "GRANT ALL PRIVILEGES ON `ragnarok`.* TO 'ragnarok'@'localhost' IDENTIFIED BY 'ragnarok' WITH GRANT OPTION; FLUSH PRIVILEGES;"

echo Creating MySQL remote root user
mysql -u root -pvagrant -e "GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY '' WITH GRANT OPTION; FLUSH PRIVILEGES;"

echo Binding MySQL to 0.0.0.0
sed -i "s/bind-address/#bind-address/g" /etc/mysql/my.cnf
/etc/init.d/mysql restart

echo Installing HHVM build...
sudo add-apt-repository ppa:mapnik/boost
wget -O - http://dl.hhvm.com/conf/hhvm.gpg.key | sudo apt-key add -
echo deb http://dl.hhvm.com/ubuntu precise main | sudo tee /etc/apt/sources.list.d/hhvm.list
sudo apt-get update
sudo apt-get install hhvm

echo Starting services...
/etc/init.d/nginx restart
/etc/init.d/php5-fpm restart
/etc/init.d/hhvm start
SCRIPT

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "precise64"
  config.vm.box_url = "http://files.vagrantup.com/precise64.box"
  config.vm.network :forwarded_port, guest: 80, host: 9080
  config.vm.network :forwarded_port, guest: 81, host: 9081
  config.vm.network :private_network, ip: "192.168.10.90"
  config.vm.synced_folder ".", "/vagrant", type: "nfs"
  config.vm.synced_folder "./web", "/var/www", type: "rsync",
    rsync__exclude: ".git/"

  config.vm.provider :virtualbox do |vb|
    vb.name = "Aesir Website Dev"
    vb.customize ["modifyvm", :id, "--memory", "2048"]
    vb.customize ["modifyvm", :id, "--cpus", "4"]
    vb.customize ["modifyvm", :id, "--hwvirtex", "on"]
    vb.customize ["modifyvm", :id, "--nestedpaging", "on"]
  end

  config.vm.provision :shell, inline: $build_script
end
