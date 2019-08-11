<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Content.digitread_article_gallery
 *
 * @copyright	Digitread Media
 * @license     MIT
 */

defined('_JEXEC') or die;

/**
 * Digitread_article_gallery plugin class.
 *
 * @since  2.5
 * @link https://docs.joomla.org/Plugin/Events/Content
 */
class PlgContentDigitread_article_gallery extends JPlugin{
	
	/**
	 * Constructor.
	 *
	 * @param 	$subject
	 * @param	array $config
	 */
	function __construct(&$subject, $config = array()) {
		
		// call parent constructor
		parent::__construct($subject, $config);
		$this->loadLanguage();
	}
	
  /**
	 * onContentPrepare Event
	 *
	 * @param   string   $context  	The context of the content being passed to the plugin.
	 * @param   mixed    &$article	The article object.  Note $article->text is also available
	 * @param   mixed    &$params  	The article params
	 * @param   integer  $page     	Optional page number. Unused. Defaults to zero.
	 *
	 * @return  boolean	True on success.
	 */
	public function onContentPrepareForm($form, $data)
	{
		if (!($form instanceof JForm))
		{
			$this->_subject->setError('JERROR_NOT_A_FORM');
			return false;
		}
        $app = JFactory::getApplication();
        $option = $app->input->get('option');
        switch($option) {
            case 'com_content':
		        // Add the extra fields to the form.
		        JForm::addFormPath(dirname(__FILE__) . '/fields');
		        $form->loadFile('gallery', false);
		        break;
        }
		return true;
	}
	
}
