<?php
/**
 * @file
 * contains \Drupal\form_block\Plugin\Block\FormBlockBlock
 */
namespace Drupal\form_block\Plugin\Block;
use Drupal\Core\Block\BlockBase;


/**
 * Provides form block
 * @block(
 *   id = "form_block_block",
 *   admin_label = @Translation("Form Block"),
 *   )
 */

class FormBlockBlock extends BlockBase{


  /**
   *{@inheritDoc}
   *Setting form in the block.
   */

  public function build()
  {
    return \Drupal::formBuilder()->getForm('Drupal\form_block\Form\FormBlockForm');
  }

}

