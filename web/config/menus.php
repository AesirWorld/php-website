<?php
// These are the main menu items that should be displayed by themes.
// They route to modules and actions.  Whether they are displayed or
// not at any given time depends on the user's account group level and/or
// their login status.
return array(
    'MenuItems' => array(
        'Main Menu'   => array(
            Flux::message('Menu.MainHome')      => array('module' => 'main'),
            Flux::message('Menu.MainPlay')      => array('exturl' => 'http://play.aesirworld.com/'),
            Flux::message('Menu.MainRegister')  => array('module' => 'account', 'action' => 'create'),
            Flux::message('Menu.MainForum')     => array('module' => 'forum'),
            Flux::message('Menu.MainItems')     => array('module' => 'item'),
            Flux::message('Menu.MainMobs')      => array('module' => 'monster'),
        ),
        'Account'     => array(
            Flux::message('Menu.AccountRegister')      => array('module' => 'account', 'action' => 'create'),
            Flux::message('Menu.AccountLogin')         => array('module' => 'account', 'action' => 'login'),
            Flux::message('Menu.AccountMyAccount')     => array('module' => 'account', 'action' => 'view'),
            Flux::message('Menu.AccountHistory')       => array('module' => 'history'),
            Flux::message('Menu.AccountLogout')        => array('module' => 'account', 'action' => 'logout'),
        ),
        'Donations'   => array(
            Flux::message('Menu.DonationsDonate')        => array('module' => 'donate'),
            Flux::message('Menu.DonationsPurchase')      => array('module' => 'purchase'),
        ),
        'Information' => array(
            Flux::message('Menu.InformationServerInfo')          => array('module' => 'server', 'action' => 'info'),
            Flux::message('Menu.InformationServerStatus')        => array('module' => 'server', 'action' => 'status'),
            Flux::message('Menu.InformationServerWoeHours')      => array('module' => 'woe'),
            Flux::message('Menu.InformationServerCastles')       => array('module' => 'castle'),
            Flux::message('Menu.InformationServerOnline')        => array('module' => 'character', 'action' => 'online'),
            Flux::message('Menu.InformationServerMapStats')      => array('module' => 'character', 'action' => 'mapstats'),
            Flux::message('Menu.InformationServerRankingInfo')   => array('module' => 'ranking', 'action' => 'character'),
        ),
        'Database'    => array(
            Flux::message('Menu.DatabaseItem') => array('module' => 'item'),
            Flux::message('Menu.DatabaseMob')  => array('module' => 'monster'),
        ),
        'Misc. Stuff' => array(
            Flux::message('Menu.MiscHerculesLogs') => array('module' => 'logdata'),
            Flux::message('Menu.MiscCpLogs')       => array('module' => 'cplog'),
            Flux::message('Menu.MiscIpBanList')    => array('module' => 'ipban'),
            Flux::message('Menu.MiscAccounts')     => array('module' => 'account'),
            Flux::message('Menu.MiscCharacters')   => array('module' => 'character'),
            Flux::message('Menu.MiscGuilds')       => array('module' => 'guild'),
            Flux::message('Menu.MiscSendMail')     => array('module' => 'mail'),
            Flux::message('Menu.MiscReinstall')    => array('module' => 'install', 'action' => 'reinstall'),
            //Flux::message('Menu.MiscAuction')       => array('module' => 'auction'),
            //Flux::message('Menu.MiscEconomy')       => array('module' => 'economy'),
        )
    ),

    // Sub-menu items that are displayed for any action belonging to a
    // particular module. The format it simple.
    'SubMenuItems' => array(
        'history' => array(
            'gamelogin'  => Flux::message('SubMenu.history.gamelogin'),
            'cplogin'    => Flux::message('SubMenu.history.cplogin'),
            'emailchange'=> Flux::message('SubMenu.history.emailchange'),
            'passchange' => Flux::message('SubMenu.history.passchange'),
            'passreset'  => Flux::message('SubMenu.history.passreset'),
        ),
        'account' => array(
            'index'      => Flux::message('SubMenu.account.index'),
            'view'       => Flux::message('SubMenu.account.view'),
            'changepass' => Flux::message('SubMenu.account.changepass'),
            'changemail' => Flux::message('SubMenu.account.changemail'),
            'changesex'  => Flux::message('SubMenu.account.changesex'),
            'transfer'   => Flux::message('SubMenu.account.transfer'),
            'xferlog'    => Flux::message('SubMenu.account.xferlog'),
            'cart'       => Flux::message('SubMenu.account.cart'),
            'login'      => Flux::message('SubMenu.account.login'),
            'create'     => Flux::message('SubMenu.account.create'),
            'resetpass'  => Flux::message('SubMenu.account.resetoass'),
            'resend'     => Flux::message('SubMenu.account.resend'),
        ),
        'guild' => array(
            'index'  => Flux::message('SubMenu.guild.index'),
            'export' => Flux::message('SubMenu.guild.export'),
        ),
        'server' => array(
            'status'     => Flux::message('SubMenu.server.status'),
            'status-xml' => Flux::message('SubMenu.server.status-xml'),
        ),
        'logdata' => array(
            //'char'    => 'Characters',
            //'inter'   => 'Interactions',
            'command' => Flux::message('SubMenu.logdata.command'),
            //'branch'  => 'Branches',
            'chat'    => Flux::message('SubMenu.logdata.chat'),
            'login'   => Flux::message('SubMenu.logdata.login'),
            //'mvp'     => 'MVP',
            //'npc'     => 'NPC',
            'pick'    => Flux::message('SubMenu.logdata.pick'),
            'zeny'    => Flux::message('SubMenu.logdata.zeny'),
        ),
        'cplog' => array(
            'paypal'     => Flux::message('SubMenu.cplog.paypal'),
            'login'      => Flux::message('SubMenu.cplog.login'),
            'resetpass'  => Flux::message('SubMenu.cplog.resetpass'),
            'changepass' => Flux::message('SubMenu.cplog.changepass'),
            'changemail' => Flux::message('SubMenu.cplog.changemail'),
            'ban'        => Flux::message('SubMenu.cplog.ban'),
            'ipban'      => Flux::message('SubMenu.cplog.ipban'),
        ),
        'purchase' => array(
            'index'    => Flux::message('SubMenu.purchase.index'),
            'cart'     => Flux::message('SubMenu.purchase.cart'),
            'checkout' => Flux::message('SubMenu.purchase.checkout'),
            'clear'    => Flux::message('SubMenu.purchase.clear'),
            'pending'  => Flux::message('SubMenu.purchase.pending'),
        ),
        'donate' => array(
            'index'   => Flux::message('SubMenu.donate.index'),
            'history' => Flux::message('SubMenu.donate.history'),
            'trusted' => Flux::message('SubMenu.donate.trusted'),
        ),
        'ipban' => array(
            'index' => Flux::message('SubMenu.ipban.index'),
            'add'   => Flux::message('SubMenu.ipban.add'),
        ),
        'ranking' => array(
            'character'  => Flux::message('SubMenu.ranking.character'),
            'guild'      => Flux::message('SubMenu.ranking.guild'),
            'zeny'       => Flux::message('SubMenu.ranking.zeny'),
            'death'      => Flux::message('SubMenu.ranking.death'),
            'alchemist'  => Flux::message('SubMenu.ranking.alchemist'),
            'blacksmith' => Flux::message('SubMenu.ranking.blacksmith'),
        ),
        'item' => array(
            'index' => Flux::message('SubMenu.item.index'),
            'add'   => Flux::message('SubMenu.item.add'),
        )
    )
);
?>
