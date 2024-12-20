<?php
namespace EssentialBlocks\Blocks;

use EssentialBlocks\Core\Block;

class Button extends Block
{
    protected $frontend_styles = [ 'essential-blocks-fontawesome', 'essential-blocks-hover-css' ];

    /**
     * Unique name of the block.
     *
     * @return string
     */
    public function get_name()
    {
        return 'button';
    }
}