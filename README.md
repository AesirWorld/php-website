Aesir World Website
=================

Install (Setup a dev enviroment)
-----------
```
vagrant up
```
* You need to have Vagrant installed on the host machine.


Notes to self
-----------
* Website located on the `web` folder, this folder is shared with the VM.
* VM Addr: 192.168.10.90
* Website running on Synced Folder: http://localhost:9080/ or http://192.168.10.90:80/ (This runs using php-fpm)
* Website running on /var/www: http://localhost:9081/ or http://192.168.10.90:81/ (This runs using hhvm)
* Use `vagrant rsync` or `vagrant rsync-auto` to sync the `web` folder with the VM `/var/www` folder.
* MySQL server running on, 192.168.10.90:3306
* Access MySQL with root and a blank password.
* The ./etc folder is copied to the VM upon provisioning. It will become useless later.
* But Nginx will write logs to the ./etc folder by default.
* You will have problems when using an Windows host, due to lack of the NFS support feature. See https://docs.vagrantup.com/v2/synced-folders/nfs.html
* You should also have `rsync` installed.
