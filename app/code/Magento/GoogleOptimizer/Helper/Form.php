<?php
/**
 * Google Optimizer Form Helper
 *
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @copyright Copyright (c) 2013 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
namespace Magento\GoogleOptimizer\Helper;

class Form extends \Magento\Core\Helper\AbstractHelper
{
    /**
     * Prepare form
     *
     * @param \Magento\Data\Form $form
     * @param \Magento\GoogleOptimizer\Model\Code|null $experimentCodeModel
     */
    public function addGoogleoptimizerFields(
        \Magento\Data\Form $form,
        \Magento\GoogleOptimizer\Model\Code $experimentCodeModel = null
    ) {
        $fieldset = $form->addFieldset('googleoptimizer_fields', array(
            'legend' => __('Google Analytics Content Experiments Code'),
        ));

        $fieldset->addField('experiment_script', 'textarea', array(
            'name' => 'experiment_script',
            'label' => __('Experiment Code'),
            'value' => $experimentCodeModel ? $experimentCodeModel->getExperimentScript() : array(),
            'class' => 'textarea googleoptimizer',
            'required' => false,
            'note' => __('Note: Experiment code should be added to the original page only.'),
        ));

        $fieldset->addField('code_id', 'hidden', array(
            'name' => 'code_id',
            'value' => $experimentCodeModel ? $experimentCodeModel->getCodeId() : '',
            'required' => false,
        ));

        $form->setFieldNameSuffix('google_experiment');
    }
}
