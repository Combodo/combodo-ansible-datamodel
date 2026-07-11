<?php

/*
 * @copyright   Copyright (C) 2023 iTop
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

/*********************************************************************
 *
 * Main user interface pages for Zone Management extension starts here
 *
 * *******************************************************************/
if (!defined('__DIR__')) {
	define('__DIR__', dirname(__FILE__));
}
if (!defined('APPROOT')) {
	if (file_exists(__DIR__.'/../../approot.inc.php')) {
		require_once(__DIR__.'/../../approot.inc.php');   // When in env-xxxx folder
	} else {
		require_once(__DIR__.'/../../../approot.inc.php');   // When in datamodels/x.x folder
	}
}
require_once(APPROOT.'/application/application.inc.php');
require_once(APPROOT.'/application/startup.inc.php');
require_once(APPROOT.'/application/wizardhelper.class.inc.php');

try {
	$operation = utils::ReadParam('operation', '');
	$bPrintable = (utils::ReadParam('printable', 0) == '1');

	require_once(APPROOT.'/application/loginwebpage.class.inc.php');
	$sLoginMessage = LoginWebPage::DoLogin(); // Check user rights and prompt if needed
	$oAppContext = new ApplicationContext();

	$oP = new iTopWebPage(Dict::S('UI:WelcomeToITop'), $bPrintable);
	$oP->SetMessage($sLoginMessage);

	$oP->set_base(utils::GetAbsoluteUrlAppRoot().'pages/');
	// All the following actions use advanced forms that require more javascript to be loaded
	$oP->LinkScriptFromAppRoot('js/forms-json-utils.js');
	$oP->LinkScriptFromAppRoot('js/wizardhelper.js');
	$oP->LinkScriptFromAppRoot('js/wizard.utils.js');
	$oP->LinkScriptFromAppRoot('js/links/links_widget.js');
	$oP->LinkScriptFromAppRoot('js/extkeywidget.js');

	switch ($operation) {
		///////////////////////////////////////////////////////////////////////////////////////////

		case 'inventoryfiledisplay':    // Display zone in BIND format
			$sClass = utils::ReadParam('class', '');
			$id = utils::ReadParam('id', '');
			$sFormat = utils::ReadParam('format', '');

			// Check if right parameters have been given
			if (empty($sClass) || empty($id)) {
				throw new ApplicationException(Dict::Format('UI:Error:2ParametersMissing', 'class', 'id'));
			}
			if ($sClass != 'AnsibleInventory') {
				throw new ApplicationException(Dict::Format('UI:Error:WrongActionForClass', $operation, $sClass));
			}

			// Check if the object exists
			$oObj = MetaModel::GetObject($sClass, $id, false /* MustBeFound */);
			if (is_null($oObj)) {
				$oP->set_title(Dict::S('UI:ErrorPageTitle'));
				$oP->P(Dict::S('UI:ObjectDoesNotExist'));
			} else {
				// Dump data file
				$oObj->DisplayInventoryFile($oP, ['format' => $sFormat]);
			}
			break; // End case datafiledisplay

			///////////////////////////////////////////////////////////////////////////////////////////

		case 'cancel':    // An action was cancelled
		case 'displaylist':
		default: // Menu node rendering (templates)
			ApplicationMenu::LoadAdditionalMenus();
			$oMenuNode = ApplicationMenu::GetMenuNode(ApplicationMenu::GetMenuIndexById(ApplicationMenu::GetActiveNodeId()));
			if (is_object($oMenuNode)) {
				$oMenuNode->RenderContent($oP, $oAppContext->GetAsHash());
				$oP->set_title($oMenuNode->GetLabel());
			}
			break;

	}
	$oP->output(); // Display the whole content now !
} catch (CoreException $e) {
	require_once(APPROOT.'/setup/setuppage.class.inc.php');
	$oP = new SetupPage(Dict::S('UI:PageTitle:FatalError'));
	if ($e instanceof SecurityException) {
		$oP->add("<h1>".Dict::S('UI:SystemIntrusion')."</h1>\n");
	} else {
		$oP->add("<h1>".Dict::S('UI:FatalErrorMessage')."</h1>\n");
	}
	$oP->error(Dict::Format('UI:Error_Details', $e->getHtmlDesc()));
	$oP->output();

	if (MetaModel::IsLogEnabledIssue()) {
		if (MetaModel::IsValidClass('EventIssue')) {
			try {
				$oLog = new EventIssue();

				$oLog->Set('message', $e->getMessage());
				$oLog->Set('userinfo', '');
				$oLog->Set('issue', $e->GetIssue());
				$oLog->Set('impact', 'Page could not be displayed');
				$oLog->Set('callstack', $e->getTrace());
				$oLog->Set('data', $e->getContextData());
				$oLog->DBInsertNoReload();
			} catch (Exception $e) {
				IssueLog::Error("Failed to log issue into the DB");
			}
		}

		IssueLog::Error($e->getMessage());
	}

	// For debugging only
	//throw $e;
} catch (Exception $e) {
	require_once(APPROOT.'/setup/setuppage.class.inc.php');
	$oP = new SetupPage(Dict::S('UI:PageTitle:FatalError'));
	$oP->add("<h1>".Dict::S('UI:FatalErrorMessage')."</h1>\n");
	$oP->error(Dict::Format('UI:Error_Details', $e->getMessage()));
	$oP->output();

	if (MetaModel::IsLogEnabledIssue()) {
		if (MetaModel::IsValidClass('EventIssue')) {
			try {
				$oLog = new EventIssue();

				$oLog->Set('message', $e->getMessage());
				$oLog->Set('userinfo', '');
				$oLog->Set('issue', 'PHP Exception');
				$oLog->Set('impact', 'Page could not be displayed');
				$oLog->Set('callstack', $e->getTrace());
				$oLog->Set('data', []);
				$oLog->DBInsertNoReload();
			} catch (Exception $e) {
				IssueLog::Error("Failed to log issue into the DB");
			}
		}

		IssueLog::Error($e->getMessage());
	}
}
