<?php
/**
 * Formulaire d'ajout d'un rôle
 *
 * Défini le contenu et le comportement du
 * formulaire d'ajout d'un rôle avec Zend_Form
 *
 */

/**
 * Formulaire d'ajout d'un rôle
 *
 * Défini le contenu et le comportement du
 * formulaire d'ajout d'un rôle avec Zend_Form
 *
 *
 * @category MyApp
 * @package Core
 * @subpackage Form
 * @version 0.01
 * @since 2012-08-06
 * @author Moi <moi@monmail.com>
 * @uses Zend_Form
 */
class Core_Form_Roleadd extends Zend_Form
{
    public function init()
    {
        $label = new Zend_Form_Element_Text('label');
        $label->setRequired(true)
              ->addFilter(
                   new Zend_Filter_StripTags()
              )
              ->addValidator(
                      new Zend_Validate_StringLength(
                          array('min' => 3, 'max' => 20)
                      )
              );
        $this->addElement($label);

        $submit = new Zend_Form_Element_Submit('submit');
        $this->addElement($submit);
    }
}
