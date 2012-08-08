<?php 

namespace Album\Form;

use Zend\Form\Form;

/**
*
* class AlbumForm manager the Album form 
*/
class AlbumForm extends Form
{

    public function __construct($name = null)
    {
        //ignore the name passed
        parent::__construct('Album');

        $this->setAttribute('method', 'post');
        /**
        *
        * add the field a input hidden
        */
        $this->add(array(            
            'name' => 'id',
            'attributes' => array(
                'type' => 'hidden'
            )
        ));
        
        /**
        *
        * add textField
        */
        $this->add(array(
            'name' => 'artist',
            'attributes' => array(
                'type' => 'text',                
            ),
            'option' => array(
                'label' => 'Artist'
            )
        ));

        /**
        *
        * add textField
        */
        $this->add(array(
            'name' => 'title',
            'attributes' => array(
                'type' => 'text',                
            ),
            'option' => array(
                'label' => 'Title'
            )
        ));

        /**
        *
        * add Submit button
        */
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',                
                'value' => 'Go',
                'id' => 'submitbutton'
            )            
        ));

    }
}
