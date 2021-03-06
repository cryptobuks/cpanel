<?php
/**
 * @brief	Módulo de contas
 * @details	Implementação das operações de contas da API do cPanel
 * @package com.imasters.php.cpanel.operation.account
 */

require_once 'com/imasters/php/cpanel/cPanelModule.php';
require_once 'com/imasters/php/cpanel/operation/account/AccountSummaryOperation.php';
require_once 'com/imasters/php/cpanel/operation/account/ChangePackageOperation.php';
require_once 'com/imasters/php/cpanel/operation/account/CreateAccountOperation.php';
require_once 'com/imasters/php/cpanel/operation/account/DomainUserDataOperation.php';
require_once 'com/imasters/php/cpanel/operation/account/EditQuotaOperation.php';
require_once 'com/imasters/php/cpanel/operation/account/LimitBandwidthOperation.php';
require_once 'com/imasters/php/cpanel/operation/account/ListAccountsOperation.php';
require_once 'com/imasters/php/cpanel/operation/account/ListSuspendedAccountsOperation.php';
require_once 'com/imasters/php/cpanel/operation/account/ModifyAccountOperation.php';
require_once 'com/imasters/php/cpanel/operation/account/PasswdOperation.php';
require_once 'com/imasters/php/cpanel/operation/account/SetSiteIPOperation.php';
require_once 'com/imasters/php/cpanel/operation/account/SuspendAccountOperation.php';
require_once 'com/imasters/php/cpanel/operation/account/TerminateAccountOperation.php';
require_once 'com/imasters/php/cpanel/operation/account/UnsuspendAccountOperation.php';
require_once 'com/imasters/php/cpanel/operation/account/ViewPrivilegesOperation.php';

/**
 * @brief	Módulo de contas do cPanel
 * @author	João Batista Neto <neto.joaobatista@imasters.com.br>
 */
class AccountModule extends cPanelModule {
	/**
	 * @param	string $user
	 * @return	AccountSummaryOperation
	 */
	public function accountSummary( $user = null ) {
		$accountSummaryOperation = new AccountSummaryOperation( $this->cpanel );

		if ( !is_null( $user ) ) {
			$accountSummaryOperation->setUser( $user );
		}

		return $accountSummaryOperation;
	}

	/**
	 * @param	string $user
	 * @param	string $pkg
	 * @return	ChangePackageOperation
	 */
	public function changePackage( $user , $pkg ) {
		$changePackageOperation = new ChangePackageOperation( $this->cpanel );
		$changePackageOperation->setUser( $user );
		$changePackageOperation->setPkg( $pkg );

		return $changePackageOperation;
	}

	/**
	 * @param	string $username
	 * @param	string $domain
	 * @return	CreateAccountOperation
	 */
	public function createAccount( $username , $domain ) {
		$createAccountOperation = new CreateAccountOperation( $this->cpanel );
		$createAccountOperation->setUsername( $username );
		$createAccountOperation->setDomain( $domain );

		return $createAccountOperation;
	}

	/**
	 * @param	string $domain
	 * @return	DomainUserDataOperation
	 */
	public function domainUserData( $domain ) {
		$domainUserDataOperation = new DomainUserDataOperation( $this->cpanel );
		$domainUserDataOperation->setDomain( $domain );

		return $domainUserDataOperation;
	}

	/**
	 * @param	string $user
	 * @param	integer $quota
	 * @return	EditQuotaOperation
	 */
	public function editQuota( $user , $quota ) {
		$editQuotaOperation = new EditQuotaOperation( $this->cpanel );
		$editQuotaOperation->setUser( $user );
		$editQuotaOperation->setQuota( $quota );

		return $editQuotaOperation;
	}

	/**
	 * @param	string $user
	 * @param	string $bwlimit
	 * @return	LimitBandwidthOperation
	 */
	public function limitBandwidth( $user , $bwlimit ) {
		$limitBWOperation = new LimitBandwidthOperation( $this->cpanel );
		$limitBWOperation->setUser( $user );
		$limitBWOperation->setBwlimit( $bwlimit );

		return $limitBWOperation;
	}

	/**
	 * @param	string $search
	 * @param	string $searchtype
	 * @return	ListAccountsOperation
	 */
	public function listAccounts( $search = null , $searchtype = null ) {
		$listAccountsOperation = new ListAccountsOperation( $this->cpanel );

		if ( !is_null( $search ) ) {
			$listAccountsOperation->setSearch( $search );
		}

		if ( !is_null( $searchtype ) ) {
			$listAccountsOperation->setSearchtype( $searchtype );
		}

		return $listAccountsOperation;
	}

	/**
	 * @return	ListSuspendedAccountsOperation
	 */
	public function listSuspendedAccounts() {
		return new ListSuspendedAccountsOperation( $this->cpanel );
	}

	/**
	 * @param	string $user
	 * @return	ModifyAccountOperation
	 */
	public function modifyAccount( $user ) {
		$modifyAccountOperation = new ModifyAccountOperation( $this->cpanel );
		$modifyAccountOperation->setUser( $user );

		return $modifyAccountOperation;
	}

	/**
	 * @param	string $user
	 * @param	string $pass
	 * @param	boolean $db_pass_update
	 * @return	PasswdOperation
	 */
	public function passwd( $user , $pass , $db_pass_update = 1 ) {
		$passwdOperation = new PasswdOperation( $this->cpanel );
		$passwdOperation->setUser( $user );
		$passwdOperation->setPass( $pass );
		$passwdOperation->setDbPassUpdate( $db_pass_update );

		return $passwdOperation;
	}

	/**
	 * @param	string $ip
	 * @return	SetSiteIPOperation
	 */
	public function setSiteIP( $ip ) {
		$setSiteIPOperation = new SetSiteIPOperation( $this->cpanel );
		$setSiteIPOperation->setIp( $ip );

		return $setSiteIPOperation;
	}

	/**
	 * @param	string $user
	 * @param	string $reason
	 * @return	SuspendAccountOperation
	 */
	public function suspendAccount( $user , $reason = null ) {
		$suspendAccountOperation = new SuspendAccountOperation( $this->cpanel );
		$suspendAccountOperation->setUser( $user );

		if ( !is_null( $reason ) ) {
			$suspendAccountOperation->setReason( $reason );
		}

		return $suspendAccountOperation;
	}

	/**
	 * @param	string $user
	 * @param	boolean $keepdns
	 * @return	TerminateAccountOperation
	 */
	public function terminateAccount( $user , $keepdns = false ) {
		$terminateAccountOperation = new TerminateAccountOperation( $this->cpanel );
		$terminateAccountOperation->setUser( $user );
		$terminateAccountOperation->setKeepdns( $keepdns );

		return $terminateAccountOperation;
	}

	/**
	 * @param	string $user
	 * @return	UnsuspendAccountOperation
	 */
	public function unsuspendAccount( $user ) {
		$unsuspendAccountOperation = new UnsuspendAccountOperation( $this->cpanel );
		$unsuspendAccountOperation->setUser( $user );

		return $unsuspendAccountOperation;
	}

	/**
	 * @return	ViewPrivilegesOperation
	 */
	public function viewPrivileges() {
		return new ViewPrivilegesOperation( $this->cpanel );
	}
}