<?php
/**
 * Config-file for navigation bar.
 *
 */
return [

    // Use for styling the menu
    'class' => 'navbar',
 
    // Here comes the menu strcture
    'items' => [

        /*// This is a menu item
        'home'  => [
            'text'  => 'Start',
            'url'   => $this->di->get('url')->create(''),
            'title' => 'Me-sidan'
        ],*/
 
        // This is a menu item for me
        'me'  => [
            'text'  => 'Me',
            'url'   => $this->di->get('url')->create(''),
            'title' => 'Startsidan dvs. me-sidan',

            // Here we add the submenu, with some menu items, as part of a existing menu item
            'submenu' => [

                'items' => [

                    // This is a menu item of the submenu
                    'Redovisning'  => [
                        'text'  => 'Redovisning',
                        'url'   => $this->di->get('url')->create('redovisning'),
                        'title' => 'Se mina redovsiningstexter'
                    ],

                ],
            ],
        ],

        'comment'  => [
            'text'  => 'Kommentarer',
            'url'   => $this->di->get('url')->create('comment'),
            'title' => 'Kommentarer'
        ],

        'source'  => [
            'text'  => 'Källkod',
            'url'   => $this->di->get('url')->create('source'),
            'title' => 'Källans såsfontän'
        ],

    ],
 


    /**
     * Callback tracing the current selected menu item base on scriptname
     *
     */
    'callback' => function ($url) {
        if ($this->di->get('request')->getCurrentUrl($url) == $this->di->get('url')->create($url)) {
            return true;
        }
    },



    /**
     * Callback to check if current page is a decendant of the menuitem, this check applies for those
     * menuitems that has the setting 'mark-if-parent' set to true.
     *
     */
    'is_parent' => function ($parent) {
        $route = $this->di->get('request')->getRoute();
        return !substr_compare($parent, $route, 0, strlen($parent));
    },



   /**
     * Callback to create the url, if needed, else comment out.
     *
     */
   /*
    'create_url' => function ($url) {
        return $this->di->get('url')->create($url);
    },
    */
];