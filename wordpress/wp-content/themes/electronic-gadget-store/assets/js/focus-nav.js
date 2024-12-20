( function( window, document ) {
  function electronic_gadget_store_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const electronic_gadget_store_nav = document.querySelector( '.sidenav' );
      if ( ! electronic_gadget_store_nav || ! electronic_gadget_store_nav.classList.contains( 'open' ) ) {
        return;
      }
      const elements = [...electronic_gadget_store_nav.querySelectorAll( 'input, a, button' )],
        electronic_gadget_store_lastEl = elements[ elements.length - 1 ],
        electronic_gadget_store_firstEl = elements[0],
        electronic_gadget_store_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;
      if ( ! shiftKey && tabKey && electronic_gadget_store_lastEl === electronic_gadget_store_activeEl ) {
        e.preventDefault();
        electronic_gadget_store_firstEl.focus();
      }
      if ( shiftKey && tabKey && electronic_gadget_store_firstEl === electronic_gadget_store_activeEl ) {
        e.preventDefault();
        electronic_gadget_store_lastEl.focus();
      }
    } );
  }
  electronic_gadget_store_keepFocusInMenu();
} )( window, document );