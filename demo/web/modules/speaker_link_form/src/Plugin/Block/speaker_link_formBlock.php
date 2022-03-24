<?php
/**
 * @file
 * Contains \Drupal\speaker_link_form\plugin\Block\speaker_link_formBlock
 */
namespace Drupal\speaker_link_form\Plugin\Block;
use Drupal\Core\Block\BlockBase;


/**
 * Provides form block
 * @block(
 *   id = "speaker_link_formBlock",
 *   admin_label = @Translation("Speaker Form Block"),
 *   )
 */

class speaker_link_formBlock extends BlockBase{

  /**
   *{@inheritDoc}
   */

  public function build()
  {
    return \Drupal::formBuilder()->getForm('Drupal\speaker_link_form\Form\speaker_link_formForm');
  }

}
