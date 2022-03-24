<?php
/**
 * @file
 * Contains /Drupal/speaker_link_form/Form/speaker_link_form
 */

 namespace Drupal\speaker_link_form\Form;
 use Drupal\Core\Database\Database;
 use Drupal\Core\Form\FormBase;
 use Drupal\Core\Form\FormStateInterface;

 class speaker_link_formForm extends FormBase{
   /**
   * {@inheritdoc}
   */
  public function getFormId(){
      return 'speaker_form';
  }
  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $values = array('APPLICATION' => t('Application'),
                 'DEVELOPMENT' => t('Development'),
                 'ENHANCEMENT' => t('Enhancement')
                );
    $form['type'] = array(
        '#title' => t('Project Type'),
        '#type' => 'select',
        '#description' => "Select the project count type.",
        '#options' => $values,
      );

    $form['name'] = array(
      '#title'=>'Name',
      '#type'=> 'textfield',
      '#required'=> TRUE,
    );
    
    $form['save'] = array(
      '#type'=> 'submit',
      '#value'=> 'Generate link and add speakers',
      '#button_type'=> 'primary'
    );
      return $form;
  }
  public function submitForm(array &$form, FormStateInterface $form_state)
  {
   
  }
 }