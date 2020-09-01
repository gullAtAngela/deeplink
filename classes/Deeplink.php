<?php
/**
 * Deeplink Generator
 *
 * This file is part of the Framie Framework.
 *
 * @link		$HeadURL$
 * @version     $Id$
 *
 * The Framie WAF/CMS is a modern web application framework and content
 * management system  written for  PHP 7.1 or  higher.  It is implemented
 * fully object-oriented and  takes advantage of the latest web standards
 * such as HTML5 and CSS3.  Thanks to the modular design  and the variety
 * of features,  the system can quickly be adapted to given requirements.
 *
 *               Copyright (c) 2019 - 2020 gullDesign
 *                         All rights reserved.
 *
 * THIS SOFTWARE IS PROVIDED  BY THE  COPYRIGHT HOLDERS  AND CONTRIBUTORS
 * "AS IS"  AND ANY  EXPRESS OR  IMPLIED  WARRANTIES,  INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED  WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE  ARE DISCLAIMED.  IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR  CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL,  EXEMPLARY,  OR  CONSEQUENTIAL  DAMAGES  (INCLUDING,  BUT NOT
 * LIMITED TO,  PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION)  HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY,  WHETHER IN CONTRACT,  STRICT LIABILITY,  OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE)  ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE,  EVEN IF ADVISED OF  THE POSSIBILITY OF SUCH DAMAGE.
 *
 *
 * @license		http://gulldesign.ch/license.txt
 * @copyright	Copyright (c) 2019 - 2020 gullDesign
 * @link		https://bitbucket.org/gulldesign/framie
 */

/**
 * Deeplink Generator
 *
 * Hiermit kann ein frei definierter Link für diverse Marketingmassnahmen nach dem
 * festgelegten Schema für Angela Bruderer zusammengestellt werden. Kurz um gesagt, 
 * ein Deeplink mit den benötigten Trackingparametern, damit ein jeder diese
 * Systematik anwenden kann.
 */
class Deeplink
{

	private $protocol 	= "https://";
	private $baseUrl 	= "www.angela-bruderer.ch";
	private $targetPage;
	private $campaign;
	private $language;
	private $period;
	private $voucher;
	
	public function __construct()
	{

	}

	/**
	 * Gibt die Base URL zurück.
	 *
	 * @return 	string
	 *         	Gibt die definierte Base URL zurück. Default ist import/.
	 */
	public function getBaseUrl()
	{
		return $this->baseUrl;
	}

	/**
	 * Setzt ein neues Base URL.
	 *
	 * @param 	string $baseUrl
	 *         	Die neu definierte Base URL.
	 */
	public function setBaseUrl($baseUrl)
	{
		$this->baseUrl = $baseUrl;
	}

	/**
	 * Definiert die Zielseite, sofern ein Link nicht auf
	 * die Homepage führen soll.
	 *
	 * @return 	string
	 *         	Gibt die Zielseite zurück. Default ist nicht festgelegt.
	 */
	public function getTargetPage()
	{
		if (!empty($this->targetPage)) {
			return "/" . $this->targetPage;
		}
	}

	/**
	 * Setzt ein neue Zielseite die den bestehenden Link erweitert.
	 *
	 * @param 	string $targetPage
	 *         	Die Zielseite.
	 */
	public function setTargetPage($targetPage = "")
	{
		if (isset($_POST['targetPage'])) {
			$this->targetPage = $_POST['targetPage'];
		} else {
			$this->targetPage = $targetPage;
		}
	}

	/**
	 * Gibt die Kampagnen Bezeichnung zurück.
	 *
	 * @return 	string
	 *         	Gibt die definierten Kampagnen Bezeichnung zurück.
	 */
	public function getCampaign()
	{
		if (!empty($this->campaign)) {
			return "/" . $this->campaign;
		}
	}

	/**
	 * Legt eine neue Kampagnen Bezeichnung fest.
	 *
	 * @param 	string $campaign
	 *         	Der neue Kampagnen Bezeichnung für den Link.
	 */
	public function setCampaign($campaign = "")
	{
		if (isset($_POST['campaign'])) {
			$this->campaign = $_POST['campaign'];
		} else {
			$this->campaign = $campaign;
		}
	}


	/**
	 * Legt eine neue Kampagnen Bezeichnung fest.
	 *
	 * @param 	string $campaignType
	 *         	Der neue Kampagnen Bezeichnung für den Link.
	 */
	public function setCampaignType($campaignType = "")
	{
		if (isset($_POST['campaignType'])) {
			$this->campaignType = $_POST['campaignType'];
		} else {
			$this->campaignType = $campaignType;
		}
	}

	/**
	 * Gibt die Kampagnen Bezeichnung zurück.
	 *
	 * @return 	string
	 *         	Gibt die definierten Kampagnen Bezeichnung zurück.
	 */
	public function getCampaignType()
	{
		if (!empty($this->campaignType)) {
			return "?campaign=" . $this->campaignType;
		}
	}

	/**
	 * Gibt den Gutscheincode zurück.
	 *
	 * @return 	string
	 *         	Gibt den definierten Gutscheincode zurück.
	 */
	public function getVoucher()
	{
		if (!empty($this->voucher)) {
			return "&couponWK=" . $this->voucher;
		}
	}

	/**
	 * Setzt einen neuen Gutscheincode.
	 *
	 * @param 	string $voucher
	 *         	Der neue Gutscheincode für den Link.
	 */
	public function setVoucher($voucher = "")
	{
		if (isset($_POST['voucher'])) {
			$this->voucher = $_POST['voucher'];
		} else {
			$this->voucher = $voucher;
		}
	}

	/**
	 * Gibt die Sprache zurück.
	 *
	 * @return 	string
	 *         	Gibt die definierte Sprache zurück.
	 */
	public function getLanguage()
	{
		if (!empty($this->language)) {
			return "/" . $this->language;
		}
	}

	/**
	 * Setzt eine neue Sprachbezeichnung.
	 *
	 * @param 	string $language
	 *         	Die festzulegende Sprache.
	 */
	public function setLanguage($language = "")
	{
		if (isset($_POST['language'])) {
			$this->language = $_POST['language'];
		} else {
			$this->language = $language;
		}
	}

	/**
	 * Gibt die Sprache zurück.
	 *
	 * @return 	string
	 *         	Gibt die definierte Sprache zurück.
	 */
	public function getPeriod()
	{
		if (!empty($this->period)) {
			return "/" . $this->period;
		}
	}

	/**
	 * Legt den Wert des Monats fest in dem die Kampagne startet.
	 *
	 * @param 	int $period
	 *         	Den Monat in der die Kampagne läuft als Zahl.
	 */
	public function setperiod($period = "")
	{
		
		if (isset($_POST['period'])) {
			list($day, $month, $year) = explode("-", $_POST['period']);
			$this->period = $month;
		} else {
			$this->period = date('yyyy-mm-dd');
		}
	}

	/**
	 * Gibt die Zusatz zurück.
	 *
	 * @return 	string
	 *         	Gibt die definierte Zusatz zurück.
	 */
	public function getAddition()
	{
		if (!empty($this->addition)) {
			return "/" . $this->addition;
		}
	}

	/**
	 * Setzt einen neuen Zusatz.
	 *
	 * @param 	string $addition
	 *         	Die festzulegende Zusatz.
	 */
	public function setAddition($addition = "")
	{
		if (isset($_POST['addition'])) {
			$this->addition = $_POST['addition'];
		} else {
			$this->addition = $addition;
		}
	}

	public function run()
	{
		$this->setTargetPage();
		$this->setCampaignType();
		$this->setCampaign();
		$this->setPeriod();
		$this->setLanguage();
		$this->setAddition();
		$this->setVoucher();

		return 	$this->protocol . 
				$this->getBaseUrl() .
				$this->getTargetPage() .
				$this->getCampaignType() .
				$this->getCampaign() .
				$this->getLanguage() .
				$this->getAddition() .
				$this->getPeriod() .
				$this->getVoucher();
	}

}