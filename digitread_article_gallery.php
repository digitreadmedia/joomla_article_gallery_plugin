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
	
	/**
	 * onContentAfterTitle Event
	 *
	 * @param   string   $context  	The context of the content being passed to the plugin.
	 * @param   mixed    &$article	The article object.  Note $article->text is also available
	 * @param   mixed    &$params  	The article params
	 * @param   integer  $page     	Optional page number. Unused. Defaults to zero.
	 *
	 * @return  boolean	True on success.
	 */
	public function onContentAfterTitle($context, &$article, &$params, $page = 0){
		return true;
	}
	
	/**
	 * onContentBeforeDisplay Event
	 *
	 * @param   string   $context  	The context of the content being passed to the plugin.
	 * @param   mixed    &$article	The article object.  Note $article->text is also available
	 * @param   mixed    &$params  	The article params
	 * @param   integer  $page     	Optional page number. Unused. Defaults to zero.
	 *
	 * @return  boolean	True on success.
	 */
	public function onContentBeforeDisplay($context, &$article, &$params, $page = 0){
		return true;
	}
	
	/**
	 * onContentAfterDisplay Event
	 *
	 * @param   string   $context  	The context of the content being passed to the plugin.
	 * @param   mixed    &$article	The article object.  Note $article->text is also available
	 * @param   mixed    &$params  	The article params
	 * @param   integer  $page     	Optional page number. Unused. Defaults to zero.
	 *
	 * @return  boolean	True on success.
	 */
	public function onContentAfterDisplay($context, &$article, &$params, $page = 0){
		return true;
	}
	
	/**
	 * onContentBeforeSave Event
	 *
	 * @param   string  $context  The context of the content passed to the plugin (added in 1.6).
	 * @param   object  $article  A JTableContent object.
	 * @param   bool    $isNew    If the content is just about to be created.
	 *
	 * @return  void
	 *
	 * @since   2.5
	 */
	public function onContentBeforeSave($context, $article, $isNew){
		return true;
	}
	
	/**
	 * onContentAfterSave Event
	 *
	 * @param   string  $context  The context of the content passed to the plugin (added in 1.6).
	 * @param   object  $article  A JTableContent object.
	 * @param   bool    $isNew    If the content is just about to be created.
	 *
	 * @return  void
	 *
	 * @since   2.5
	 */
	public function onContentAfterSave($context, $article, $isNew){
		return true;
	}
	
	/**
	 * Runs on content preparation
	 *
	 * @param   string  $context  The context for the data
	 * @param   object  $data     An object containing the data for the form.
	 *
	 * @return  boolean
	 *
	 * @since   1.6
	 */
	public function onContentPrepareData($context, $data) {
		return true;
	}
	
	/**
	 * onContentBeforeDelete Event
	 *
	 * @param   string  $context  The context for the content passed to the plugin.
	 * @param   object  $data     The data relating to the content that was deleted.
	 *
	 * @return  boolean
	 *
	 * @since   1.6
	 */
	public function onContentBeforeDelete($context, $data){
		return true;
	}
	
	/**
	 * onContentAfterDelete Event
	 *
	 * @param   string  $context  The context for the content passed to the plugin.
	 * @param   object  $data     The data relating to the content that was deleted.
	 *
	 * @return  boolean
	 *
	 * @since   1.6
	 */
	public function onContentAfterDelete($context, $data){
		return true;
	}
	
	/**
	 * onContentChangeState Event
	 *
	 * @param   string   $context  The context for the content passed to the plugin.
	 * @param   array    $pks      A list of primary key ids of the content that has changed state.
	 * @param   integer  $value    The value of the state that the content has been changed to.
	 *
	 * @return  void
	 *
	 * @since   2.5
	 */
	public function onContentChangeState($context, $pks, $value){
		return true;
	}
	
	/**
	 * onContentSearch Event
	 *
	 * The SQL must return the following fields that are used in a common display
	 * routine: href, title, section, created, text, browsernav.
	 *
	 * @param   string  $text      Target search string.
	 * @param   string  $phrase    Matching option (possible values: exact|any|all).  Default is "any".
	 * @param   string  $ordering  Ordering option (possible values: newest|oldest|popular|alpha|category).  Default is "newest".
	 * @param   mixed   $areas     An array if the search is to be restricted to areas or null to search all areas.
	 *
	 * @return  array  Search results.
	 *
	 * @since   1.6
	 */
	public function onContentSearch($text, $phrase = '', $ordering = '', $areas = null){
		return [];
	}
	
	/**
	 * Determine areas searchable by this plugin.
	 *
	 * @return  array  An array of search areas.
	 *
	 * @since   1.6
	 */
	public function onContentSearchAreas(){
		return [];
	}
	
	public function onContentPrepare($context, &$article, &$params, $page = 0) {

	}	
}
