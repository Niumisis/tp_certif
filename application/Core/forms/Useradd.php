<?php
/**
 * Formulaire d'ajout d'un utilisateur
 *
 * Défini le contenu et le comportement du
 * formulaire d'ajout d'un utilisateur avec Zend_Form
 *
 */

/**
 * Formulaire d'ajout d'un utilisateur
 *
 * Défini le contenu et le comportement du
 * formulaire d'ajout d'un utilisateur avec Zend_Form
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
class Core_Form_Useradd extends Zend_Form
{
    public function init()
    {
        $login = new Zend_Form_Element_Text('login');
        $login->setRequired(true)
              ->addFilter(
                   new Zend_Filter_StripTags()
              )
              ->addValidator(
                      new Zend_Validate_StringLength(
                          array('min' => 3, 'max' => 20)
                      )
              );
        $this->addElement($login);
/*
        $admin = new Zend_Form_Element_Checkbox('admin');
        $admin->setLabel('Privilege pour la ressource ' . $resource);
        $this->addElement($admin);

        $password = new Zend_Form_Element_Text('password');
        $password->setRequired(true)
                 ->addValidator(
                          new Zend_Validate_StringLength(
                              array('min' => 6)
                          )
                  );
        $this->addElement($password);

        $passwordConf = new Zend_Form_Element_Text('passwordconf');
        $passwordConf->setRequired(true)
                      ->addValidator(
                          new Zend_Validate_Identical('password')
                  );
        $this->addElement($passwordConf);
*/
        $submit = new Zend_Form_Element_Submit('submit');
        $this->addElement($submit);
    }
}
