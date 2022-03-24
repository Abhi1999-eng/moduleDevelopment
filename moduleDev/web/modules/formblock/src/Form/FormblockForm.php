<?php
/**
 * @file
 * Contains Drupal/formblock/Form/FormblockForm.php
 */

 namespace Drupal\formblock\Form;
 use Drupal\Core\Database\Database;
 use Drupal\Core\Form\FormBase;
 use Drupal\Core\Form\FormStateInterface;
 

 class FormblockForm extends FormBase{
    public function getFormId() {
        return 'feedback_form';
    }

    /**
     * {@inheritdoc}
     * This function is to build the form with two fields:
     * 1. Name textfield
     * 2. Radio buttons with 1-5 for the feedback
     */
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form['name'] = array(
            '#type' => 'textfield',
            '#title' => ('Name'),
            '#required' => TRUE,
          );
          $form['feedback'] = array (
            '#type' => 'radios',
            '#title' => ('Feedback'),
            '#options' => array(
              'Very Bad' =>'0',
              'Bad' =>'1',
              'Ok' => '2',
              'Good' => '3',
              'Very Good' => '4'
            ),
          );
          $form['submit'] = array(
            '#type' => 'submit',
            '#value' => $this->t('Save'),
            '#button_type' => 'primary',
          );
          return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        $postData = $form_state->getValues();//$postData is getting the values from the form
        unset($postData['save'],$postData['form_build_id'],$postData['form_token'],$postData['form_id'],$postData['op']);
        $query = \Drupal::database();//Accessing the DB
        $query->insert('module_development')
        ->fields($postData)
        ->execute();
        $this->messenger()
        ->addMessage('Your Feedback Saved Successfully');
    }
 }
