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
class Core_Form_Recapitulatifadd extends Zend_Form
{
    public function init()
    {
        $start = new Zend_Form_Element_Submit('debut');
        $this->addElement($start);
    }
}
