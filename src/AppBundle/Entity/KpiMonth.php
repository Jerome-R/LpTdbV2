<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

use Application\Sonata\UserBundle\Entity\User;

/**
 * KpiMonth
 *
 * @ORM\Table(name="app_kpi_month", uniqueConstraints={
 *      @ORM\UniqueConstraint(name="UNIQUE_USER_DATE", columns={"user_id", "date"})
 * })
 * @ORM\Entity(repositoryClass="AppBundle\Entity\KpiMonthRepository")
 * @UniqueEntity(fields={"user_id", "date"})
 * @ORM\HasLifecycleCallbacks()
 */
class KpiMonth
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User", inversedBy="kpiMonths")
     */
    private $user;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_linked_m0", type="decimal", precision=9, scale=2)
     */
    private $txTransacLinkedM0;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_linked_ytd", type="decimal", precision=9, scale=2)
     */
    private $txTransacLinkedYtd;

    /*
     *
     *  KPI MONTH
     *
     */
    
    /**
     * @var integer
     *
     * @ORM\Column(name="nb_transac_m0", type="integer")
     */
    private $nbTransacM0;
    
    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_npe_m0", type="decimal", precision=9, scale=2)
     */
    private $txTransacNpeM0;
    
    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_nve_m0", type="decimal", precision=9, scale=2)
     */
    private $txTransacNveM0;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_npes_m0", type="decimal", precision=9, scale=2)
     */
    private $txTransacNpesM0;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_nves_m0", type="decimal", precision=9, scale=2)
     */
    private $txTransacNvesM0;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_npesa_m0", type="decimal", precision=9, scale=2)
     */
    private $txTransacNpesaM0;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_nvesa_m0", type="decimal", precision=9, scale=2)
     */
    private $txTransacNvesaM0;

    /**
     * @var integer
     *
     * @ORM\Column(name="rank_npe_m0", type="integer")
     */
    private $rankNpeM0 = 1;

    /**
     * @var integer
     *
     * @ORM\Column(name="rank_npes_m0", type="integer")
     */
    private $rankNpesM0 = 1;

    /**
     * @var integer
     *
     * @ORM\Column(name="rank_npesa_m0", type="integer")
     */
    private $rankNpesaM0 = 1;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbre_clients_contactables_email_h", type="integer")
     */
    private $nbreClientsContactablesEmailH;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbre_clients_inactifs_email_h", type="integer")
     */
    private $nbreClientsInactifsEmailH;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbre_clients_animes_m0", type="integer")
     */
    private $nbreClientsAnimesM0;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbre_clients_transformes_m0", type="integer")
     */
    private $nbreClientsTransformesM0;

    /**
     * @var integer
     *
     * @ORM\Column(name="CA_clients_transformes_m0", type="integer")
     */
    private $caClientsTransformesM0;


    /*
     *
     *  KPI YTD
     *
     */


    /**
     * @var integer
     *
     * @ORM\Column(name="nb_transac_ytd", type="integer")
     */
    private $nbTransacYtd;
    
    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_npe_ytd", type="decimal", precision=9, scale=2)
     */
    private $txTransacNpeYtd;
    
    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_nve_ytd", type="decimal", precision=9, scale=2)
     */
    private $txTransacNveYtd;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_npes_ytd", type="decimal", precision=9, scale=2)
     */
    private $txTransacNpesYtd;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_nves_ytd", type="decimal", precision=9, scale=2)
     */
    private $txTransacNvesYtd;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_npesa_ytd", type="decimal", precision=9, scale=2)
     */
    private $txTransacNpesaYtd;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_nvesa_ytd", type="decimal", precision=9, scale=2)
     */
    private $txTransacNvesaYtd;

    /**
     * @var integer
     *
     * @ORM\Column(name="rank_npe_ytd", type="integer")
     */
    private $rankNpeYtd = 1;

    /**
     * @var integer
     *
     * @ORM\Column(name="rank_npes_ytd", type="integer")
     */
    private $rankNpesYtd = 1;

    /**
     * @var integer
     *
     * @ORM\Column(name="rank_npesa_ytd", type="integer")
     */
    private $rankNpesaYtd = 1;

    /**
     * @var integer
     *
     * @ORM\Column(name="ca_crm_ytd", type="integer")
     */
    private $caCrmYtd;


    /*
     *
     *  KPI SATISFACTION
     *
     */

    /**
     * @var integer
     *
     * @ORM\Column(name="nbre_questsatisf_m0", type="integer")
     */
    private $nbrequestsatisfm0;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbre_questsatisf_ytd", type="integer")
     */
    private $nbrequestsatisfytd;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="nbre_questsatisf_montred_m0", type="integer")
     */
    private $nbrequestsatisfmontredm0;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="nbre_questsatisf_montre_ytd", type="integer")
     */
    private $nbrequestsatisfmontreytd;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="nbre_questsatisf_piled_m0", type="integer")
     */
    private $nbrequestsatisfpiledm0;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="nbre_questsatisf_pile_ytd", type="integer")
     */
    private $nbrequestsatisfpileytd;
    
    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_quest_satisf_promoteur_m0", type="decimal", precision=9, scale=2)
     */
    private $txquestsatisfpromoteurdm0;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_quest_satisf_promoteur_ytd", type="decimal", precision=9, scale=2)
     */
    private $txquestsatisfpromoteurytd;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_quest_satisf_passif_m0", type="decimal", precision=9, scale=2)
     */
    private $txquestsatisfpassifm0;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_quest_satisf_passif_ytd", type="decimal", precision=9, scale=2)
     */
    private $txquestsatisfpassifytd;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_quest_satisf_detracteur_m0", type="decimal", precision=9, scale=2)
     */
    private $txquestsatisfdetracteurm0;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_quest_satisf_detracteur_ytd", type="decimal", precision=9, scale=2)
     */
    private $txquestsatisfdetracteurytd;

    /**
     * @var decimal
     *
     * @ORM\Column(name="quest_satisf_nps_m0", type="decimal", precision=9, scale=2)
     */
    private $questsatisfnpsm0;

    /**
     * @var decimal
     *
     * @ORM\Column(name="quest_satisf_nps_ytd", type="decimal", precision=9, scale=2)
     */
    private $questsatisfnpsytd;

    
    /**
     * @var integer
     *
     * @ORM\Column(name="quest_satisf_rank_nps_m0", type="integer")
     */
    private $questsatisfranknpsm0;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="quest_satisf_rank_nps_ytd", type="integer")
     */
    private $questsatisfranknpsytd;

    /**
     * @var decimal
     *
     * @ORM\Column(name="moy_quest_satisf_montre_q2_m0", type="decimal", precision=9, scale=2)
     */
    private $moyquestsatisfmontreq2m0;

    /**
     * @var decimal
     *
     * @ORM\Column(name="moy_quest_satisf_montre_q3_m0", type="decimal", precision=9, scale=2)
     */
    private $moyquestsatisfmontreq3m0;

    /**
     * @var decimal
     *
     * @ORM\Column(name="moy_quest_satisf_montre_q4_m0", type="decimal", precision=9, scale=2)
     */
    private $moyquestsatisfmontreq4m0;

    /**
     * @var decimal
     *
     * @ORM\Column(name="moy_quest_satisf_montre_q5_m0", type="decimal", precision=9, scale=2)
     */
    private $moyquestsatisfmontreq5m0;

    /**
     * @var decimal
     *
     * @ORM\Column(name="moy_quest_satisf_montre_q6_m0", type="decimal", precision=9, scale=2)
     */
    private $moyquestsatisfmontreq6m0;

    /**
     * @var decimal
     *
     * @ORM\Column(name="moy_quest_satisf_montre_q2_ytd", type="decimal", precision=9, scale=2)
     */
    private $moyquestsatisfmontreq2ytd;

    /**
     * @var decimal
     *
     * @ORM\Column(name="moy_quest_satisf_montre_q3_ytd", type="decimal", precision=9, scale=2)
     */
    private $moyquestsatisfmontreq3ytd;

    /**
     * @var decimal
     *
     * @ORM\Column(name="moy_quest_satisf_montre_q4_ytd", type="decimal", precision=9, scale=2)
     */
    private $moyquestsatisfmontreq4ytd;

    /**
     * @var decimal
     *
     * @ORM\Column(name="moy_quest_satisf_montre_q5_ytd", type="decimal", precision=9, scale=2)
     */
    private $moyquestsatisfmontreq5ytd;

    /**
     * @var decimal
     *
     * @ORM\Column(name="moy_quest_satisf_montre_q6_ytd", type="decimal", precision=9, scale=2)
     */
    private $moyquestsatisfmontreq6ytd;

    /**
     * @var decimal
     *
     * @ORM\Column(name="moy_quest_satisf_pile_q2_m0", type="decimal", precision=9, scale=2)
     */
    private $moyquestsatisfpileq2m0;

    /**
     * @var decimal
     *
     * @ORM\Column(name="moy_quest_satisf_pile_q3_m0", type="decimal", precision=9, scale=2)
     */
    private $moyquestsatisfpileq3m0;

    /**
     * @var decimal
     *
     * @ORM\Column(name="moy_quest_satisf_pile_q4_m0", type="decimal", precision=9, scale=2)
     */
    private $moyquestsatisfpileq4m0;

    /**
     * @var decimal
     *
     * @ORM\Column(name="moy_quest_satisf_pile_q2_ytd", type="decimal", precision=9, scale=2)
     */
    private $moyquestsatisfpileq2ytd;

    /**
     * @var decimal
     *
     * @ORM\Column(name="moy_quest_satisf_pile_q3_ytd", type="decimal", precision=9, scale=2)
     */
    private $moyquestsatisfpileq3ytd;

    /**
     * @var decimal
     *
     * @ORM\Column(name="moy_quest_satisf_pile_q4_ytd", type="decimal", precision=9, scale=2)
     */
    private $moyquestsatisfpileq4ytd;




    /**
     * Nouvelle variables Avril 2019
     */

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_linked_optin_m0", type="decimal", precision=9, scale=2)
     */
    private $txTransacLinkedOptinM0;


    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_linked_optout_m0", type="decimal", precision=9, scale=2)
     */
    private $txTransacLinkedOptoutM0;


    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_npei_m0", type="decimal", precision=9, scale=2)
     */
    private $txTransacNpeiM0;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_npeo_m0", type="decimal", precision=9, scale=2)
     */
    private $txTransacNpeoM0;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_npesi_m0", type="decimal", precision=9, scale=2)
     */
    private $txTransacNpesiM0;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_npeso_m0", type="decimal", precision=9, scale=2)
     */
    private $txTransacNpesoM0;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_npesai_m0", type="decimal", precision=9, scale=2)
     */
    private $txTransacNpesaiM0;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_npesao_m0", type="decimal", precision=9, scale=2)
     */
    private $txTransacNpesaoM0;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_nps_m0", type="decimal", precision=9, scale=2)
     */
    private $txTransacNpsM0;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_npsi_m0", type="decimal", precision=9, scale=2)
     */
    private $txTransacNpsiM0;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_npso_m0", type="decimal", precision=9, scale=2)
     */
    private $txTransacNpsoM0;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_nvs_m0", type="decimal", precision=9, scale=2)
     */
    private $txTransacNvsM0;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_npa_m0", type="decimal", precision=9, scale=2)
     */
    private $txTransacNpaM0;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_npai_m0", type="decimal", precision=9, scale=2)
     */
    private $txTransacNpaiM0;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_npao_m0", type="decimal", precision=9, scale=2)
     */
    private $txTransacNpaoM0;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_nva_m0", type="decimal", precision=9, scale=2)
     */
    private $txTransacNvaM0;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_npes2_m0", type="decimal", precision=9, scale=2)
     */
    private $txTransacNpes2M0;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_npesi2_m0", type="decimal", precision=9, scale=2)
     */
    private $txTransacNpesi2M0;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_npeso2_m0", type="decimal", precision=9, scale=2)
     */
    private $txTransacNpeso2M0;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_nves2_m0", type="decimal", precision=9, scale=2)
     */
    private $txTransacNves2M0;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_npesa2_m0", type="decimal", precision=9, scale=2)
     */
    private $txTransacNpesa2M0;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_npesai2_m0", type="decimal", precision=9, scale=2)
     */
    private $txTransacNpesai2M0;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_npesao2_m0", type="decimal", precision=9, scale=2)
     */
    private $txTransacNpesao2M0;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_nvesa2_m0", type="decimal", precision=9, scale=2)
     */
    private $txTransacNvesa2M0;




    /**
     * Nouvelle variables Avril 2019
     */

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_linked_optin_ytd", type="decimal", precision=9, scale=2)
     */
    private $txTransacLinkedOptinYTD;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_linked_optout_ytd", type="decimal", precision=9, scale=2)
     */
    private $txTransacLinkedOptoutYTD;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_npei_ytd", type="decimal", precision=9, scale=2)
     */
    private $txTransacNpeiYtd;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_npeo_ytd", type="decimal", precision=9, scale=2)
     */
    private $txTransacNpeoYtd;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_npesi_ytd", type="decimal", precision=9, scale=2)
     */
    private $txTransacNpesiYtd;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_npeso_ytd", type="decimal", precision=9, scale=2)
     */
    private $txTransacNpesoYtd;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_npesai_ytd", type="decimal", precision=9, scale=2)
     */
    private $txTransacNpesaiYtd;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_npesao_ytd", type="decimal", precision=9, scale=2)
     */
    private $txTransacNpesaoYtd;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_nps_ytd", type="decimal", precision=9, scale=2)
     */
    private $txTransacNpsYtd;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_npsi_ytd", type="decimal", precision=9, scale=2)
     */
    private $txTransacNpsiYtd;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_npso_ytd", type="decimal", precision=9, scale=2)
     */
    private $txTransacNpsoYtd;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_nvs_ytd", type="decimal", precision=9, scale=2)
     */
    private $txTransacNvsYtd;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_npa_ytd", type="decimal", precision=9, scale=2)
     */
    private $txTransacNpaYtd;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_npai_ytd", type="decimal", precision=9, scale=2)
     */
    private $txTransacNpaiYtd;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_npao_ytd", type="decimal", precision=9, scale=2)
     */
    private $txTransacNpaoYtd;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_nva_ytd", type="decimal", precision=9, scale=2)
     */
    private $txTransacNvaYtd;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_npes2_ytd", type="decimal", precision=9, scale=2)
     */
    private $txTransacNpes2Ytd;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_npesi2_ytd", type="decimal", precision=9, scale=2)
     */
    private $txTransacNpesi2Ytd;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_npeso2_ytd", type="decimal", precision=9, scale=2)
     */
    private $txTransacNpeso2Ytd;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_nves2_ytd", type="decimal", precision=9, scale=2)
     */
    private $txTransacNves2Ytd;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_npesa2_ytd", type="decimal", precision=9, scale=2)
     */
    private $txTransacNpesa2Ytd;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_npesai2_ytd", type="decimal", precision=9, scale=2)
     */
    private $txTransacNpesai2Ytd;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_npesao2_ytd", type="decimal", precision=9, scale=2)
     */
    private $txTransacNpesao2Ytd;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tx_transac_nvesa2_ytd", type="decimal", precision=9, scale=2)
     */
    private $txTransacNvesa2Ytd;

    

    /**
     * @var integer
     *
     * @ORM\Column(name="rank_npe2_m0", type="integer")
     */
    private $rankNpe2M0 = 1;

    /**
     * @var integer
     *
     * @ORM\Column(name="rank_nps2_m0", type="integer")
     */
    private $rankNps2M0 = 1;

    /**
     * @var integer
     *
     * @ORM\Column(name="rank_npes2_m0", type="integer")
     */
    private $rankNpes2M0 = 1;



    /**
     * @var integer
     *
     * @ORM\Column(name="rank_npe2_ytd", type="integer")
     */
    private $rankNpe2Ytd = 1;

    /**
     * @var integer
     *
     * @ORM\Column(name="rank_nps2_ytd", type="integer")
     */
    private $rankNps2Ytd = 1;

    /**
     * @var integer
     *
     * @ORM\Column(name="rank_npes2_ytd", type="integer")
     */
    private $rankNpes2Ytd = 1;

    /*
     *
     *  GETTERS / SETTERS
     *
     */


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    public function setUser(User $user = null)
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return kpiMonth
     */
    public function setDate($date)
    {
        if( !($date instanceof \DateTime) ) $date = new \DateTime($date);
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set nbTransacM0
     *
     * @param integer $nbTransacM0
     * @return KpiMonth
     */
    public function setNbTransacM0($nbTransacM0)
    {
        $this->nbTransacM0 = $nbTransacM0;

        return $this;
    }

    /**
     * Get nbTransacM0
     *
     * @return integer 
     */
    public function getNbTransacM0()
    {
        return $this->nbTransacM0;
    }

    /**
     * Set txTransacNpeM0
     *
     * @param decimal $txTransacNpeM0
     * @return KpiMonth
     */
    public function setTxTransacNpeM0($txTransacNpeM0)
    {
        $this->txTransacNpeM0 = $txTransacNpeM0;

        return $this;
    }

    /**
     * Get txTransacNpeM0
     *
     * @return decimal 
     */
    public function getTxTransacNpeM0()
    {
        return $this->txTransacNpeM0;
    }

    /**
     * Set txTransacNveM0
     *
     * @param decimal $txTransacNveM0
     * @return KpiMonth
     */
    public function setTxTransacNveM0($txTransacNveM0)
    {
        $this->txTransacNveM0 = $txTransacNveM0;

        return $this;
    }

    /**
     * Get txTransacNveM0
     *
     * @return decimal 
     */
    public function getTxTransacNveM0()
    {
        return $this->txTransacNveM0;
    }

    /**
     * Set txTransacNpesM0
     *
     * @param decimal $txTransacNpesM0
     * @return KpiMonth
     */
    public function setTxTransacNpesM0($txTransacNpesM0)
    {
        $this->txTransacNpesM0 = $txTransacNpesM0;

        return $this;
    }

    /**
     * Get txTransacNpesM0
     *
     * @return decimal 
     */
    public function getTxTransacNpesM0()
    {
        return $this->txTransacNpesM0;
    }

    /**
     * Set txTransacNvesM0
     *
     * @param decimal $txTransacNvesM0
     * @return KpiMonth
     */
    public function setTxTransacNvesM0($txTransacNvesM0)
    {
        $this->txTransacNvesM0 = $txTransacNvesM0;

        return $this;
    }

    /**
     * Get txTransacNvesM0
     *
     * @return decimal 
     */
    public function getTxTransacNvesM0()
    {
        return $this->txTransacNvesM0;
    }

    /**
     * Set txTransacNpesaM0
     *
     * @param decimal $txTransacNpesaM0
     * @return KpiMonth
     */
    public function setTxTransacNpesaM0($txTransacNpesaM0)
    {
        $this->txTransacNpesaM0 = $txTransacNpesaM0;

        return $this;
    }

    /**
     * Get txTransacNpesaM0
     *
     * @return decimal 
     */
    public function getTxTransacNpesaM0()
    {
        return $this->txTransacNpesaM0;
    }

    /**
     * Set txTransacNvesaM0
     *
     * @param decimal $txTransacNvesaM0
     * @return KpiMonth
     */
    public function setTxTransacNvesaM0($txTransacNvesaM0)
    {
        $this->txTransacNvesaM0 = $txTransacNvesaM0;

        return $this;
    }

    /**
     * Get txTransacNvesaM0
     *
     * @return decimal 
     */
    public function getTxTransacNvesaM0()
    {
        return $this->txTransacNvesaM0;
    }

    /**
     * Set rankNpeM0
     *
     * @param string $rankNpeM0
     * @return KpiMonth
     */
    public function setRankNpeM0($rankNpeM0)
    {
        $this->rankNpeM0 = $rankNpeM0;

        return $this;
    }

    /**
     * Get rankNpeM0
     *
     * @return string 
     */
    public function getRankNpeM0()
    {
        return $this->rankNpeM0;
    }

    /**
     * Set rankNpesM0
     *
     * @param string $rankNpesM0
     * @return KpiMonth
     */
    public function setRankNpesM0($rankNpesM0)
    {
        $this->rankNpesM0 = $rankNpesM0;

        return $this;
    }

    /**
     * Get rankNpesM0
     *
     * @return string 
     */
    public function getRankNpesM0()
    {
        return $this->rankNpesM0;
    }

    /**
     * Set rankNpesaM0
     *
     * @param string $rankNpesaM0
     * @return KpiMonth
     */
    public function setRankNpesaM0($rankNpesaM0)
    {
        $this->rankNpesaM0 = $rankNpesaM0;

        return $this;
    }

    /**
     * Get rankNpesaM0
     *
     * @return string 
     */
    public function getRankNpesaM0()
    {
        return $this->rankNpesaM0;
    }

    /**
     * Set nbreClientsContactablesEmailH
     *
     * @param integer $nbreClientsContactablesEmailH
     * @return KpiMonth
     */
    public function setNbreClientsContactablesEmailH($nbreClientsContactablesEmailH)
    {
        $this->nbreClientsContactablesEmailH = $nbreClientsContactablesEmailH;

        return $this;
    }

    /**
     * Get nbreClientsContactablesEmailH
     *
     * @return integer 
     */
    public function getNbreClientsContactablesEmailH()
    {
        return $this->nbreClientsContactablesEmailH;
    }

    /**
     * Set nbreClientsInactifsEmailH
     *
     * @param integer $nbreClientsInactifsEmailH
     * @return KpiMonth
     */
    public function setNbreClientsInactifsEmailH($nbreClientsInactifsEmailH)
    {
        $this->nbreClientsInactifsEmailH = $nbreClientsInactifsEmailH;

        return $this;
    }

    /**
     * Get nbreClientsInactifsEmailH
     *
     * @return integer 
     */
    public function getNbreClientsInactifsEmailH()
    {
        return $this->nbreClientsInactifsEmailH;
    }

    /**
     * Set nbreClientsAnimesM0
     *
     * @param integer $nbreClientsAnimesM0
     * @return KpiMonth
     */
    public function setNbreClientsAnimesM0($nbreClientsAnimesM0)
    {
        $this->nbreClientsAnimesM0 = $nbreClientsAnimesM0;

        return $this;
    }

    /**
     * Get nbreClientsAnimesM0
     *
     * @return integer 
     */
    public function getNbreClientsAnimesM0()
    {
        return $this->nbreClientsAnimesM0;
    }

    /**
     * Set nbreClientsTransformesM0
     *
     * @param integer $nbreClientsTransformesM0
     * @return KpiMonth
     */
    public function setNbreClientsTransformesM0($nbreClientsTransformesM0)
    {
        $this->nbreClientsTransformesM0 = $nbreClientsTransformesM0;

        return $this;
    }

    /**
     * Get nbreClientsTransformesM0
     *
     * @return integer 
     */
    public function getNbreClientsTransformesM0()
    {
        return $this->nbreClientsTransformesM0;
    }

    /**
     * Set caClientsTransformesM0
     *
     * @param integer $caClientsTransformesM0
     * @return KpiMonth
     */
    public function setCaClientsTransformesM0($caClientsTransformesM0)
    {
        $this->caClientsTransformesM0 = $caClientsTransformesM0;

        return $this;
    }

    /**
     * Get caClientsTransformesM0
     *
     * @return integer 
     */
    public function getCaClientsTransformesM0()
    {
        return $this->caClientsTransformesM0;
    }


    // Function for sonata to render text-link relative to the entity

    /**
     * __toString
     * 
     * @return string
     */
    public function __toString() {
        return $this->getId();
    }

    /**
     * Set nbTransacYtd
     *
     * @param integer $nbTransacYtd
     * @return KpiMonth
     */
    public function setNbTransacYtd($nbTransacYtd)
    {
        $this->nbTransacYtd = $nbTransacYtd;

        return $this;
    }

    /**
     * Get nbTransacYtd
     *
     * @return integer 
     */
    public function getNbTransacYtd()
    {
        return $this->nbTransacYtd;
    }

    /**
     * Set txTransacNpeYtd
     *
     * @param string $txTransacNpeYtd
     * @return KpiMonth
     */
    public function setTxTransacNpeYtd($txTransacNpeYtd)
    {
        $this->txTransacNpeYtd = $txTransacNpeYtd;

        return $this;
    }

    /**
     * Get txTransacNpeYtd
     *
     * @return string 
     */
    public function getTxTransacNpeYtd()
    {
        return $this->txTransacNpeYtd;
    }

    /**
     * Set txTransacNveYtd
     *
     * @param string $txTransacNveYtd
     * @return KpiMonth
     */
    public function setTxTransacNveYtd($txTransacNveYtd)
    {
        $this->txTransacNveYtd = $txTransacNveYtd;

        return $this;
    }

    /**
     * Get txTransacNveYtd
     *
     * @return string 
     */
    public function getTxTransacNveYtd()
    {
        return $this->txTransacNveYtd;
    }

    /**
     * Set txTransacNpesYtd
     *
     * @param string $txTransacNpesYtd
     * @return KpiMonth
     */
    public function setTxTransacNpesYtd($txTransacNpesYtd)
    {
        $this->txTransacNpesYtd = $txTransacNpesYtd;

        return $this;
    }

    /**
     * Get txTransacNpesYtd
     *
     * @return string 
     */
    public function getTxTransacNpesYtd()
    {
        return $this->txTransacNpesYtd;
    }

    /**
     * Set txTransacNvesYtd
     *
     * @param string $txTransacNvesYtd
     * @return KpiMonth
     */
    public function setTxTransacNvesYtd($txTransacNvesYtd)
    {
        $this->txTransacNvesYtd = $txTransacNvesYtd;

        return $this;
    }

    /**
     * Get txTransacNvesYtd
     *
     * @return string 
     */
    public function getTxTransacNvesYtd()
    {
        return $this->txTransacNvesYtd;
    }

    /**
     * Set txTransacNpesaYtd
     *
     * @param string $txTransacNpesaYtd
     * @return KpiMonth
     */
    public function setTxTransacNpesaYtd($txTransacNpesaYtd)
    {
        $this->txTransacNpesaYtd = $txTransacNpesaYtd;

        return $this;
    }

    /**
     * Get txTransacNpesaYtd
     *
     * @return string 
     */
    public function getTxTransacNpesaYtd()
    {
        return $this->txTransacNpesaYtd;
    }

    /**
     * Set txTransacNvesaYtd
     *
     * @param string $txTransacNvesaYtd
     * @return KpiMonth
     */
    public function setTxTransacNvesaYtd($txTransacNvesaYtd)
    {
        $this->txTransacNvesaYtd = $txTransacNvesaYtd;

        return $this;
    }

    /**
     * Get txTransacNvesaYtd
     *
     * @return string 
     */
    public function getTxTransacNvesaYtd()
    {
        return $this->txTransacNvesaYtd;
    }

    /**
     * Set rankNpeYtd
     *
     * @param integer $rankNpeYtd
     * @return KpiMonth
     */
    public function setRankNpeYtd($rankNpeYtd)
    {
        $this->rankNpeYtd = $rankNpeYtd;

        return $this;
    }

    /**
     * Get rankNpeYtd
     *
     * @return integer 
     */
    public function getRankNpeYtd()
    {
        return $this->rankNpeYtd;
    }

    /**
     * Set rankNpesYtd
     *
     * @param integer $rankNpesYtd
     * @return KpiMonth
     */
    public function setRankNpesYtd($rankNpesYtd)
    {
        $this->rankNpesYtd = $rankNpesYtd;

        return $this;
    }

    /**
     * Get rankNpesYtd
     *
     * @return integer 
     */
    public function getRankNpesYtd()
    {
        return $this->rankNpesYtd;
    }

    /**
     * Set rankNpesaYtd
     *
     * @param integer $rankNpesaYtd
     * @return KpiMonth
     */
    public function setRankNpesaYtd($rankNpesaYtd)
    {
        $this->rankNpesaYtd = $rankNpesaYtd;

        return $this;
    }

    /**
     * Get rankNpesaYtd
     *
     * @return integer 
     */
    public function getRankNpesaYtd()
    {
        return $this->rankNpesaYtd;
    }

    /**
     * Set caCrmYtd
     *
     * @param integer $caCrmYtd
     * @return KpiMonth
     */
    public function setCaCrmYtd($caCrmYtd)
    {
        $this->caCrmYtd = $caCrmYtd;

        return $this;
    }

    /**
     * Get caCrmYtd
     *
     * @return integer 
     */
    public function getCaCrmYtd()
    {
        return $this->caCrmYtd;
    }

    /**
     * Set txTransacLinkedM0
     *
     * @param integer $txTransacLinkedM0
     * @return KpiMonth
     */
    public function setTxTransacLinkedM0($txTransacLinkedM0)
    {
        $this->txTransacLinkedM0 = $txTransacLinkedM0;

        return $this;
    }

    /**
     * Get txTransacLinkedM0
     *
     * @return integer 
     */
    public function getTxTransacLinkedM0()
    {
        return $this->txTransacLinkedM0;
    }

    /**
     * Set txTransacLinkedYtd
     *
     * @param integer $txTransacLinkedYtd
     * @return KpiMonth
     */
    public function setTxTransacLinkedYtd($txTransacLinkedYtd)
    {
        $this->txTransacLinkedYtd = $txTransacLinkedYtd;

        return $this;
    }

    /**
     * Get txTransacLinkedYtd
     *
     * @return integer 
     */
    public function getTxTransacLinkedYtd()
    {
        return $this->txTransacLinkedYtd;
    }

    /**
     * Set nbrequestsatisfm0
     *
     * @param integer $nbrequestsatisfm0
     * @return KpiMonth
     */
    public function setNbrequestsatisfm0($nbrequestsatisfm0)
    {
        $this->nbrequestsatisfm0 = $nbrequestsatisfm0;

        return $this;
    }

    /**
     * Get nbrequestsatisfm0
     *
     * @return integer 
     */
    public function getNbrequestsatisfm0()
    {
        return $this->nbrequestsatisfm0;
    }

    /**
     * Set nbrequestsatisfytd
     *
     * @param integer $nbrequestsatisfytd
     * @return KpiMonth
     */
    public function setNbrequestsatisfytd($nbrequestsatisfytd)
    {
        $this->nbrequestsatisfytd = $nbrequestsatisfytd;

        return $this;
    }

    /**
     * Get nbrequestsatisfytd
     *
     * @return integer 
     */
    public function getNbrequestsatisfytd()
    {
        return $this->nbrequestsatisfytd;
    }

    /**
     * Set nbrequestsatisfmontredm0
     *
     * @param integer $nbrequestsatisfmontredm0
     * @return KpiMonth
     */
    public function setNbrequestsatisfmontredm0($nbrequestsatisfmontredm0)
    {
        $this->nbrequestsatisfmontredm0 = $nbrequestsatisfmontredm0;

        return $this;
    }

    /**
     * Get nbrequestsatisfmontredm0
     *
     * @return integer 
     */
    public function getNbrequestsatisfmontredm0()
    {
        return $this->nbrequestsatisfmontredm0;
    }

    /**
     * Set nbrequestsatisfmontreytd
     *
     * @param integer $nbrequestsatisfmontreytd
     * @return KpiMonth
     */
    public function setNbrequestsatisfmontreytd($nbrequestsatisfmontreytd)
    {
        $this->nbrequestsatisfmontreytd = $nbrequestsatisfmontreytd;

        return $this;
    }

    /**
     * Get nbrequestsatisfmontreytd
     *
     * @return integer 
     */
    public function getNbrequestsatisfmontreytd()
    {
        return $this->nbrequestsatisfmontreytd;
    }

    /**
     * Set nbrequestsatisfpiledm0
     *
     * @param integer $nbrequestsatisfpiledm0
     * @return KpiMonth
     */
    public function setNbrequestsatisfpiledm0($nbrequestsatisfpiledm0)
    {
        $this->nbrequestsatisfpiledm0 = $nbrequestsatisfpiledm0;

        return $this;
    }

    /**
     * Get nbrequestsatisfpiledm0
     *
     * @return integer 
     */
    public function getNbrequestsatisfpiledm0()
    {
        return $this->nbrequestsatisfpiledm0;
    }

    /**
     * Set nbrequestsatisfpileytd
     *
     * @param integer $nbrequestsatisfpileytd
     * @return KpiMonth
     */
    public function setNbrequestsatisfpileytd($nbrequestsatisfpileytd)
    {
        $this->nbrequestsatisfpileytd = $nbrequestsatisfpileytd;

        return $this;
    }

    /**
     * Get nbrequestsatisfpileytd
     *
     * @return integer 
     */
    public function getNbrequestsatisfpileytd()
    {
        return $this->nbrequestsatisfpileytd;
    }

    /**
     * Set txquestsatisfpromoteurdm0
     *
     * @param integer $txquestsatisfpromoteurdm0
     * @return KpiMonth
     */
    public function setTxquestsatisfpromoteurdm0($txquestsatisfpromoteurdm0)
    {
        $this->txquestsatisfpromoteurdm0 = $txquestsatisfpromoteurdm0;

        return $this;
    }

    /**
     * Get txquestsatisfpromoteurdm0
     *
     * @return integer 
     */
    public function getTxquestsatisfpromoteurdm0()
    {
        return $this->txquestsatisfpromoteurdm0;
    }

    /**
     * Set txquestsatisfpromoteurytd
     *
     * @param string $txquestsatisfpromoteurytd
     * @return KpiMonth
     */
    public function setTxquestsatisfpromoteurytd($txquestsatisfpromoteurytd)
    {
        $this->txquestsatisfpromoteurytd = $txquestsatisfpromoteurytd;

        return $this;
    }

    /**
     * Get txquestsatisfpromoteurytd
     *
     * @return string 
     */
    public function getTxquestsatisfpromoteurytd()
    {
        return $this->txquestsatisfpromoteurytd;
    }

    /**
     * Set txquestsatisfpassifm0
     *
     * @param string $txquestsatisfpassifm0
     * @return KpiMonth
     */
    public function setTxquestsatisfpassifm0($txquestsatisfpassifm0)
    {
        $this->txquestsatisfpassifm0 = $txquestsatisfpassifm0;

        return $this;
    }

    /**
     * Get txquestsatisfpassifm0
     *
     * @return string 
     */
    public function getTxquestsatisfpassifm0()
    {
        return $this->txquestsatisfpassifm0;
    }

    /**
     * Set txquestsatisfpassifytd
     *
     * @param string $txquestsatisfpassifytd
     * @return KpiMonth
     */
    public function setTxquestsatisfpassifytd($txquestsatisfpassifytd)
    {
        $this->txquestsatisfpassifytd = $txquestsatisfpassifytd;

        return $this;
    }

    /**
     * Get txquestsatisfpassifytd
     *
     * @return string 
     */
    public function getTxquestsatisfpassifytd()
    {
        return $this->txquestsatisfpassifytd;
    }

    /**
     * Set txquestsatisfdetracteurm0
     *
     * @param string $txquestsatisfdetracteurm0
     * @return KpiMonth
     */
    public function setTxquestsatisfdetracteurm0($txquestsatisfdetracteurm0)
    {
        $this->txquestsatisfdetracteurm0 = $txquestsatisfdetracteurm0;

        return $this;
    }

    /**
     * Get txquestsatisfdetracteurm0
     *
     * @return string 
     */
    public function getTxquestsatisfdetracteurm0()
    {
        return $this->txquestsatisfdetracteurm0;
    }

    /**
     * Set txquestsatisfdetracteurytd
     *
     * @param string $txquestsatisfdetracteurytd
     * @return KpiMonth
     */
    public function setTxquestsatisfdetracteurytd($txquestsatisfdetracteurytd)
    {
        $this->txquestsatisfdetracteurytd = $txquestsatisfdetracteurytd;

        return $this;
    }

    /**
     * Get txquestsatisfdetracteurytd
     *
     * @return string 
     */
    public function getTxquestsatisfdetracteurytd()
    {
        return $this->txquestsatisfdetracteurytd;
    }

    /**
     * Set questsatisfnpsm0
     *
     * @param string $questsatisfnpsm0
     * @return KpiMonth
     */
    public function setQuestsatisfnpsm0($questsatisfnpsm0)
    {
        $this->questsatisfnpsm0 = $questsatisfnpsm0;

        return $this;
    }

    /**
     * Get questsatisfnpsm0
     *
     * @return string 
     */
    public function getQuestsatisfnpsm0()
    {
        return $this->questsatisfnpsm0;
    }

    /**
     * Set questsatisfnpsytd
     *
     * @param string $questsatisfnpsytd
     * @return KpiMonth
     */
    public function setQuestsatisfnpsytd($questsatisfnpsytd)
    {
        $this->questsatisfnpsytd = $questsatisfnpsytd;

        return $this;
    }

    /**
     * Get questsatisfnpsytd
     *
     * @return string 
     */
    public function getQuestsatisfnpsytd()
    {
        return $this->questsatisfnpsytd;
    }

    /**
     * Set questsatisfranknpsm0
     *
     * @param integer $questsatisfranknpsm0
     * @return KpiMonth
     */
    public function setQuestsatisfranknpsm0($questsatisfranknpsm0)
    {
        $this->questsatisfranknpsm0 = $questsatisfranknpsm0;

        return $this;
    }

    /**
     * Get questsatisfranknpsm0
     *
     * @return integer 
     */
    public function getQuestsatisfranknpsm0()
    {
        return $this->questsatisfranknpsm0;
    }

    /**
     * Set questsatisfranknpsytd
     *
     * @param integer $questsatisfranknpsytd
     * @return KpiMonth
     */
    public function setQuestsatisfranknpsytd($questsatisfranknpsytd)
    {
        $this->questsatisfranknpsytd = $questsatisfranknpsytd;

        return $this;
    }

    /**
     * Get questsatisfranknpsytd
     *
     * @return integer 
     */
    public function getQuestsatisfranknpsytd()
    {
        return $this->questsatisfranknpsytd;
    }

    /**
     * Set moyquestsatisfmontreq2m0
     *
     * @param string $moyquestsatisfmontreq2m0
     * @return KpiMonth
     */
    public function setMoyquestsatisfmontreq2m0($moyquestsatisfmontreq2m0)
    {
        $this->moyquestsatisfmontreq2m0 = $moyquestsatisfmontreq2m0;

        return $this;
    }

    /**
     * Get moyquestsatisfmontreq2m0
     *
     * @return string 
     */
    public function getMoyquestsatisfmontreq2m0()
    {
        return $this->moyquestsatisfmontreq2m0;
    }

    /**
     * Set moyquestsatisfmontreq3m0
     *
     * @param string $moyquestsatisfmontreq3m0
     * @return KpiMonth
     */
    public function setMoyquestsatisfmontreq3m0($moyquestsatisfmontreq3m0)
    {
        $this->moyquestsatisfmontreq3m0 = $moyquestsatisfmontreq3m0;

        return $this;
    }

    /**
     * Get moyquestsatisfmontreq3m0
     *
     * @return string 
     */
    public function getMoyquestsatisfmontreq3m0()
    {
        return $this->moyquestsatisfmontreq3m0;
    }

    /**
     * Set moyquestsatisfmontreq4m0
     *
     * @param string $moyquestsatisfmontreq4m0
     * @return KpiMonth
     */
    public function setMoyquestsatisfmontreq4m0($moyquestsatisfmontreq4m0)
    {
        $this->moyquestsatisfmontreq4m0 = $moyquestsatisfmontreq4m0;

        return $this;
    }

    /**
     * Get moyquestsatisfmontreq4m0
     *
     * @return string 
     */
    public function getMoyquestsatisfmontreq4m0()
    {
        return $this->moyquestsatisfmontreq4m0;
    }

    /**
     * Set moyquestsatisfmontreq5m0
     *
     * @param string $moyquestsatisfmontreq5m0
     * @return KpiMonth
     */
    public function setMoyquestsatisfmontreq5m0($moyquestsatisfmontreq5m0)
    {
        $this->moyquestsatisfmontreq5m0 = $moyquestsatisfmontreq5m0;

        return $this;
    }

    /**
     * Get moyquestsatisfmontreq5m0
     *
     * @return string 
     */
    public function getMoyquestsatisfmontreq5m0()
    {
        return $this->moyquestsatisfmontreq5m0;
    }

    /**
     * Set moyquestsatisfmontreq6m0
     *
     * @param string $moyquestsatisfmontreq6m0
     * @return KpiMonth
     */
    public function setMoyquestsatisfmontreq6m0($moyquestsatisfmontreq6m0)
    {
        $this->moyquestsatisfmontreq6m0 = $moyquestsatisfmontreq6m0;

        return $this;
    }

    /**
     * Get moyquestsatisfmontreq6m0
     *
     * @return string 
     */
    public function getMoyquestsatisfmontreq6m0()
    {
        return $this->moyquestsatisfmontreq6m0;
    }

    /**
     * Set moyquestsatisfmontreq2ytd
     *
     * @param string $moyquestsatisfmontreq2ytd
     * @return KpiMonth
     */
    public function setMoyquestsatisfmontreq2ytd($moyquestsatisfmontreq2ytd)
    {
        $this->moyquestsatisfmontreq2ytd = $moyquestsatisfmontreq2ytd;

        return $this;
    }

    /**
     * Get moyquestsatisfmontreq2ytd
     *
     * @return string 
     */
    public function getMoyquestsatisfmontreq2ytd()
    {
        return $this->moyquestsatisfmontreq2ytd;
    }

    /**
     * Set moyquestsatisfmontreq3ytd
     *
     * @param string $moyquestsatisfmontreq3ytd
     * @return KpiMonth
     */
    public function setMoyquestsatisfmontreq3ytd($moyquestsatisfmontreq3ytd)
    {
        $this->moyquestsatisfmontreq3ytd = $moyquestsatisfmontreq3ytd;

        return $this;
    }

    /**
     * Get moyquestsatisfmontreq3ytd
     *
     * @return string 
     */
    public function getMoyquestsatisfmontreq3ytd()
    {
        return $this->moyquestsatisfmontreq3ytd;
    }

    /**
     * Set moyquestsatisfmontreq4ytd
     *
     * @param string $moyquestsatisfmontreq4ytd
     * @return KpiMonth
     */
    public function setMoyquestsatisfmontreq4ytd($moyquestsatisfmontreq4ytd)
    {
        $this->moyquestsatisfmontreq4ytd = $moyquestsatisfmontreq4ytd;

        return $this;
    }

    /**
     * Get moyquestsatisfmontreq4ytd
     *
     * @return string 
     */
    public function getMoyquestsatisfmontreq4ytd()
    {
        return $this->moyquestsatisfmontreq4ytd;
    }

    /**
     * Set moyquestsatisfmontreq5ytd
     *
     * @param string $moyquestsatisfmontreq5ytd
     * @return KpiMonth
     */
    public function setMoyquestsatisfmontreq5ytd($moyquestsatisfmontreq5ytd)
    {
        $this->moyquestsatisfmontreq5ytd = $moyquestsatisfmontreq5ytd;

        return $this;
    }

    /**
     * Get moyquestsatisfmontreq5ytd
     *
     * @return string 
     */
    public function getMoyquestsatisfmontreq5ytd()
    {
        return $this->moyquestsatisfmontreq5ytd;
    }

    /**
     * Set moyquestsatisfmontreq6ytd
     *
     * @param string $moyquestsatisfmontreq6ytd
     * @return KpiMonth
     */
    public function setMoyquestsatisfmontreq6ytd($moyquestsatisfmontreq6ytd)
    {
        $this->moyquestsatisfmontreq6ytd = $moyquestsatisfmontreq6ytd;

        return $this;
    }

    /**
     * Get moyquestsatisfmontreq6ytd
     *
     * @return string 
     */
    public function getMoyquestsatisfmontreq6ytd()
    {
        return $this->moyquestsatisfmontreq6ytd;
    }

    /**
     * Set moyquestsatisfpileq2m0
     *
     * @param string $moyquestsatisfpileq2m0
     * @return KpiMonth
     */
    public function setMoyquestsatisfpileq2m0($moyquestsatisfpileq2m0)
    {
        $this->moyquestsatisfpileq2m0 = $moyquestsatisfpileq2m0;

        return $this;
    }

    /**
     * Get moyquestsatisfpileq2m0
     *
     * @return string 
     */
    public function getMoyquestsatisfpileq2m0()
    {
        return $this->moyquestsatisfpileq2m0;
    }

    /**
     * Set moyquestsatisfpileq3m0
     *
     * @param string $moyquestsatisfpileq3m0
     * @return KpiMonth
     */
    public function setMoyquestsatisfpileq3m0($moyquestsatisfpileq3m0)
    {
        $this->moyquestsatisfpileq3m0 = $moyquestsatisfpileq3m0;

        return $this;
    }

    /**
     * Get moyquestsatisfpileq3m0
     *
     * @return string 
     */
    public function getMoyquestsatisfpileq3m0()
    {
        return $this->moyquestsatisfpileq3m0;
    }

    /**
     * Set moyquestsatisfpileq4m0
     *
     * @param string $moyquestsatisfpileq4m0
     * @return KpiMonth
     */
    public function setMoyquestsatisfpileq4m0($moyquestsatisfpileq4m0)
    {
        $this->moyquestsatisfpileq4m0 = $moyquestsatisfpileq4m0;

        return $this;
    }

    /**
     * Get moyquestsatisfpileq4m0
     *
     * @return string 
     */
    public function getMoyquestsatisfpileq4m0()
    {
        return $this->moyquestsatisfpileq4m0;
    }

    /**
     * Set moyquestsatisfpileq2ytd
     *
     * @param string $moyquestsatisfpileq2ytd
     * @return KpiMonth
     */
    public function setMoyquestsatisfpileq2ytd($moyquestsatisfpileq2ytd)
    {
        $this->moyquestsatisfpileq2ytd = $moyquestsatisfpileq2ytd;

        return $this;
    }

    /**
     * Get moyquestsatisfpileq2ytd
     *
     * @return string 
     */
    public function getMoyquestsatisfpileq2ytd()
    {
        return $this->moyquestsatisfpileq2ytd;
    }

    /**
     * Set moyquestsatisfpileq3ytd
     *
     * @param string $moyquestsatisfpileq3ytd
     * @return KpiMonth
     */
    public function setMoyquestsatisfpileq3ytd($moyquestsatisfpileq3ytd)
    {
        $this->moyquestsatisfpileq3ytd = $moyquestsatisfpileq3ytd;

        return $this;
    }

    /**
     * Get moyquestsatisfpileq3ytd
     *
     * @return string 
     */
    public function getMoyquestsatisfpileq3ytd()
    {
        return $this->moyquestsatisfpileq3ytd;
    }

    /**
     * Set moyquestsatisfpileq4ytd
     *
     * @param string $moyquestsatisfpileq4ytd
     * @return KpiMonth
     */
    public function setMoyquestsatisfpileq4ytd($moyquestsatisfpileq4ytd)
    {
        $this->moyquestsatisfpileq4ytd = $moyquestsatisfpileq4ytd;

        return $this;
    }

    /**
     * Get moyquestsatisfpileq4ytd
     *
     * @return string 
     */
    public function getMoyquestsatisfpileq4ytd()
    {
        return $this->moyquestsatisfpileq4ytd;
    }


    public function getTxTransacNpeiM0()
    {
        return $this->txTransacNpeiM0;
    }
     
    public function setTxTransacNpeiM0($txTransacNpeiM0)
    {
        $this->txTransacNpeiM0 = $txTransacNpeiM0;
        return $this;
    }
    public function getTxTransacNpeoM0()
    {
        return $this->txTransacNpeoM0;
    }
     
    public function setTxTransacNpeoM0($txTransacNpeoM0)
    {
        $this->txTransacNpeoM0 = $txTransacNpeoM0;
        return $this;
    }
    public function getTxTransacNpesiM0()
    {
        return $this->txTransacNpesiM0;
    }
     
    public function setTxTransacNpesiM0($txTransacNpesiM0)
    {
        $this->txTransacNpesiM0 = $txTransacNpesiM0;
        return $this;
    }
    public function getTxTransacNpesoM0()
    {
        return $this->txTransacNpesoM0;
    }
     
    public function setTxTransacNpesoM0($txTransacNpesoM0)
    {
        $this->txTransacNpesoM0 = $txTransacNpesoM0;
        return $this;
    }
    public function getTxTransacNpesaiM0()
    {
        return $this->txTransacNpesaiM0;
    }
     
    public function setTxTransacNpesaiM0($txTransacNpesaiM0)
    {
        $this->txTransacNpesaiM0 = $txTransacNpesaiM0;
        return $this;
    }
    public function getTxTransacNpesaoM0()
    {
        return $this->txTransacNpesaoM0;
    }
     
    public function setTxTransacNpesaoM0($txTransacNpesaoM0)
    {
        $this->txTransacNpesaoM0 = $txTransacNpesaoM0;
        return $this;
    }
    public function getTxTransacNpsM0()
    {
        return $this->txTransacNpsM0;
    }
     
    public function setTxTransacNpsM0($txTransacNpsM0)
    {
        $this->txTransacNpsM0 = $txTransacNpsM0;
        return $this;
    }
    public function getTxTransacNpsiM0()
    {
        return $this->txTransacNpsiM0;
    }
     
    public function setTxTransacNpsiM0($txTransacNpsiM0)
    {
        $this->txTransacNpsiM0 = $txTransacNpsiM0;
        return $this;
    }
    public function getTxTransacNpsoM0()
    {
        return $this->txTransacNpsoM0;
    }
     
    public function setTxTransacNpsoM0($txTransacNpsoM0)
    {
        $this->txTransacNpsoM0 = $txTransacNpsoM0;
        return $this;
    }
    public function getTxTransacNvsM0()
    {
        return $this->txTransacNvsM0;
    }
     
    public function setTxTransacNvsM0($txTransacNvsM0)
    {
        $this->txTransacNvsM0 = $txTransacNvsM0;
        return $this;
    }
    public function getTxTransacNpaM0()
    {
        return $this->txTransacNpaM0;
    }
     
    public function setTxTransacNpaM0($txTransacNpaM0)
    {
        $this->txTransacNpaM0 = $txTransacNpaM0;
        return $this;
    }
    public function getTxTransacNpaiM0()
    {
        return $this->txTransacNpaiM0;
    }
     
    public function setTxTransacNpaiM0($txTransacNpaiM0)
    {
        $this->txTransacNpaiM0 = $txTransacNpaiM0;
        return $this;
    }
    public function getTxTransacNpaoM0()
    {
        return $this->txTransacNpaoM0;
    }
     
    public function setTxTransacNpaoM0($txTransacNpaoM0)
    {
        $this->txTransacNpaoM0 = $txTransacNpaoM0;
        return $this;
    }
    public function getTxTransacNvaM0()
    {
        return $this->txTransacNvaM0;
    }
     
    public function setTxTransacNvaM0($txTransacNvaM0)
    {
        $this->txTransacNvaM0 = $txTransacNvaM0;
        return $this;
    }
    public function getTxTransacNpes2M0()
    {
        return $this->txTransacNpes2M0;
    }
     
    public function setTxTransacNpes2M0($txTransacNpes2M0)
    {
        $this->txTransacNpes2M0 = $txTransacNpes2M0;
        return $this;
    }
    public function getTxTransacNpesi2M0()
    {
        return $this->txTransacNpesi2M0;
    }
     
    public function setTxTransacNpesi2M0($txTransacNpesi2M0)
    {
        $this->txTransacNpesi2M0 = $txTransacNpesi2M0;
        return $this;
    }
    public function getTxTransacNpeso2M0()
    {
        return $this->txTransacNpeso2M0;
    }
     
    public function setTxTransacNpeso2M0($txTransacNpeso2M0)
    {
        $this->txTransacNpeso2M0 = $txTransacNpeso2M0;
        return $this;
    }
    public function getTxTransacNves2M0()
    {
        return $this->txTransacNves2M0;
    }
     
    public function setTxTransacNves2M0($txTransacNves2M0)
    {
        $this->txTransacNves2M0 = $txTransacNves2M0;
        return $this;
    }
    public function getTxTransacNpesa2M0()
    {
        return $this->txTransacNpesa2M0;
    }
     
    public function setTxTransacNpesa2M0($txTransacNpesa2M0)
    {
        $this->txTransacNpesa2M0 = $txTransacNpesa2M0;
        return $this;
    }
    public function getTxTransacNpesai2M0()
    {
        return $this->txTransacNpesai2M0;
    }
     
    public function setTxTransacNpesai2M0($txTransacNpesai2M0)
    {
        $this->txTransacNpesai2M0 = $txTransacNpesai2M0;
        return $this;
    }
    public function getTxTransacNpesao2M0()
    {
        return $this->txTransacNpesao2M0;
    }
     
    public function setTxTransacNpesao2M0($txTransacNpesao2M0)
    {
        $this->txTransacNpesao2M0 = $txTransacNpesao2M0;
        return $this;
    }
    public function getTxTransacNvesa2M0()
    {
        return $this->txTransacNvesa2M0;
    }
     
    public function setTxTransacNvesa2M0($txTransacNvesa2M0)
    {
        $this->txTransacNvesa2M0 = $txTransacNvesa2M0;
        return $this;
    }
    public function getTxTransacNpeiYtd()
    {
        return $this->txTransacNpeiYtd;
    }
     
    public function setTxTransacNpeiYtd($txTransacNpeiYtd)
    {
        $this->txTransacNpeiYtd = $txTransacNpeiYtd;
        return $this;
    }
    public function getTxTransacNpeoYtd()
    {
        return $this->txTransacNpeoYtd;
    }
     
    public function setTxTransacNpeoYtd($txTransacNpeoYtd)
    {
        $this->txTransacNpeoYtd = $txTransacNpeoYtd;
        return $this;
    }
    public function getTxTransacNpesiYtd()
    {
        return $this->txTransacNpesiYtd;
    }
     
    public function setTxTransacNpesiYtd($txTransacNpesiYtd)
    {
        $this->txTransacNpesiYtd = $txTransacNpesiYtd;
        return $this;
    }
    public function getTxTransacNpesoYtd()
    {
        return $this->txTransacNpesoYtd;
    }
     
    public function setTxTransacNpesoYtd($txTransacNpesoYtd)
    {
        $this->txTransacNpesoYtd = $txTransacNpesoYtd;
        return $this;
    }
    public function getTxTransacNpesaiYtd()
    {
        return $this->txTransacNpesaiYtd;
    }
     
    public function setTxTransacNpesaiYtd($txTransacNpesaiYtd)
    {
        $this->txTransacNpesaiYtd = $txTransacNpesaiYtd;
        return $this;
    }
    public function getTxTransacNpesaoYtd()
    {
        return $this->txTransacNpesaoYtd;
    }
     
    public function setTxTransacNpesaoYtd($txTransacNpesaoYtd)
    {
        $this->txTransacNpesaoYtd = $txTransacNpesaoYtd;
        return $this;
    }
    public function getTxTransacNpsYtd()
    {
        return $this->txTransacNpsYtd;
    }
     
    public function setTxTransacNpsYtd($txTransacNpsYtd)
    {
        $this->txTransacNpsYtd = $txTransacNpsYtd;
        return $this;
    }
    public function getTxTransacNpsiYtd()
    {
        return $this->txTransacNpsiYtd;
    }
     
    public function setTxTransacNpsiYtd($txTransacNpsiYtd)
    {
        $this->txTransacNpsiYtd = $txTransacNpsiYtd;
        return $this;
    }
    public function getTxTransacNpsoYtd()
    {
        return $this->txTransacNpsoYtd;
    }
     
    public function setTxTransacNpsoYtd($txTransacNpsoYtd)
    {
        $this->txTransacNpsoYtd = $txTransacNpsoYtd;
        return $this;
    }
    public function getTxTransacNvsYtd()
    {
        return $this->txTransacNvsYtd;
    }
     
    public function setTxTransacNvsYtd($txTransacNvsYtd)
    {
        $this->txTransacNvsYtd = $txTransacNvsYtd;
        return $this;
    }
    public function getTxTransacNpaYtd()
    {
        return $this->txTransacNpaYtd;
    }
     
    public function setTxTransacNpaYtd($txTransacNpaYtd)
    {
        $this->txTransacNpaYtd = $txTransacNpaYtd;
        return $this;
    }
    public function getTxTransacNpaiYtd()
    {
        return $this->txTransacNpaiYtd;
    }
     
    public function setTxTransacNpaiYtd($txTransacNpaiYtd)
    {
        $this->txTransacNpaiYtd = $txTransacNpaiYtd;
        return $this;
    }
    public function getTxTransacNpaoYtd()
    {
        return $this->txTransacNpaoYtd;
    }
     
    public function setTxTransacNpaoYtd($txTransacNpaoYtd)
    {
        $this->txTransacNpaoYtd = $txTransacNpaoYtd;
        return $this;
    }
    public function getTxTransacNvaYtd()
    {
        return $this->txTransacNvaYtd;
    }
     
    public function setTxTransacNvaYtd($txTransacNvaYtd)
    {
        $this->txTransacNvaYtd = $txTransacNvaYtd;
        return $this;
    }
    public function getTxTransacNpes2Ytd()
    {
        return $this->txTransacNpes2Ytd;
    }
     
    public function setTxTransacNpes2Ytd($txTransacNpes2Ytd)
    {
        $this->txTransacNpes2Ytd = $txTransacNpes2Ytd;
        return $this;
    }
    public function getTxTransacNpesi2Ytd()
    {
        return $this->txTransacNpesi2Ytd;
    }
     
    public function setTxTransacNpesi2Ytd($txTransacNpesi2Ytd)
    {
        $this->txTransacNpesi2Ytd = $txTransacNpesi2Ytd;
        return $this;
    }
    public function getTxTransacNpeso2Ytd()
    {
        return $this->txTransacNpeso2Ytd;
    }
     
    public function setTxTransacNpeso2Ytd($txTransacNpeso2Ytd)
    {
        $this->txTransacNpeso2Ytd = $txTransacNpeso2Ytd;
        return $this;
    }
    public function getTxTransacNves2Ytd()
    {
        return $this->txTransacNves2Ytd;
    }
     
    public function setTxTransacNves2Ytd($txTransacNves2Ytd)
    {
        $this->txTransacNves2Ytd = $txTransacNves2Ytd;
        return $this;
    }
    public function getTxTransacNpesa2Ytd()
    {
        return $this->txTransacNpesa2Ytd;
    }
     
    public function setTxTransacNpesa2Ytd($txTransacNpesa2Ytd)
    {
        $this->txTransacNpesa2Ytd = $txTransacNpesa2Ytd;
        return $this;
    }
    public function getTxTransacNpesai2Ytd()
    {
        return $this->txTransacNpesai2Ytd;
    }
     
    public function setTxTransacNpesai2Ytd($txTransacNpesai2Ytd)
    {
        $this->txTransacNpesai2Ytd = $txTransacNpesai2Ytd;
        return $this;
    }
    public function getTxTransacNpesao2Ytd()
    {
        return $this->txTransacNpesao2Ytd;
    }
     
    public function setTxTransacNpesao2Ytd($txTransacNpesao2Ytd)
    {
        $this->txTransacNpesao2Ytd = $txTransacNpesao2Ytd;
        return $this;
    }
    public function getTxTransacNvesa2Ytd()
    {
        return $this->txTransacNvesa2Ytd;
    }
     
    public function setTxTransacNvesa2Ytd($txTransacNvesa2Ytd)
    {
        $this->txTransacNvesa2Ytd = $txTransacNvesa2Ytd;
        return $this;
    }

    public function getTxTransacLinkedOptinM0()
    {
        return $this->txTransacLinkedOptinM0;
    }
     
    public function setTxTransacLinkedOptinM0($txTransacLinkedOptinM0)
    {
        $this->txTransacLinkedOptinM0 = $txTransacLinkedOptinM0;
        return $this;
    }
    public function getTxTransacLinkedOptinYTD()
    {
        return $this->txTransacLinkedOptinYTD;
    }
     
    public function setTxTransacLinkedOptinYTD($txTransacLinkedOptinYTD)
    {
        $this->txTransacLinkedOptinYTD = $txTransacLinkedOptinYTD;
        return $this;
    }



    public function getTxTransacLinkedOptoutM0()
    {
        return $this->txTransacLinkedOptoutM0;
    }
     
    public function setTxTransacLinkedOptoutM0($txTransacLinkedOptoutM0)
    {
        $this->txTransacLinkedOptoutM0 = $txTransacLinkedOptoutM0;
        return $this;
    }
    public function getTxTransacLinkedOptoutYTD()
    {
        return $this->txTransacLinkedOptoutYTD;
    }
     
    public function setTxTransacLinkedOptoutYTD($txTransacLinkedOptoutYTD)
    {
        $this->txTransacLinkedOptoutYTD = $txTransacLinkedOptoutYTD;
        return $this;
    }

    /**
     * Set rankNpe2M0
     *
     * @param string $rankNpe2M0
     * @return KpiMonth
     */
    public function setRankNpe2M0($rankNpe2M0)
    {
        $this->rankNpe2M0 = $rankNpe2M0;

        return $this;
    }

    /**
     * Get rankNpe2M0
     *
     * @return string 
     */
    public function getRankNpe2M0()
    {
        return $this->rankNpe2M0;
    }

    /**
     * Set rankNps2M0
     *
     * @param string $rankNps2M0
     * @return KpiMonth
     */
    public function setRankNps2M0($rankNps2M0)
    {
        $this->rankNps2M0 = $rankNps2M0;

        return $this;
    }

    /**
     * Get rankNps2M0
     *
     * @return string 
     */
    public function getRankNps2M0()
    {
        return $this->rankNps2M0;
    }

    /**
     * Set rankNpes2M0
     *
     * @param string $rankNpes2M0
     * @return KpiMonth
     */
    public function setRankNpes2M0($rankNpes2M0)
    {
        $this->rankNpes2M0 = $rankNpes2M0;

        return $this;
    }

    /**
     * Get rankNpes2M0
     *
     * @return string 
     */
    public function getRankNpes2M0()
    {
        return $this->rankNpes2M0;
    }

    /**
     * Set rankNpe2Ytd
     *
     * @param string $rankNpe2Ytd
     * @return KpiMonth
     */
    public function setRankNpe2Ytd($rankNpe2Ytd)
    {
        $this->rankNpe2Ytd = $rankNpe2Ytd;

        return $this;
    }

    /**
     * Get rankNpe2Ytd
     *
     * @return string 
     */
    public function getRankNpe2Ytd()
    {
        return $this->rankNpe2Ytd;
    }

    /**
     * Set rankNps2Ytd
     *
     * @param string $rankNps2Ytd
     * @return KpiMonth
     */
    public function setRankNps2Ytd($rankNps2Ytd)
    {
        $this->rankNps2Ytd = $rankNps2Ytd;

        return $this;
    }

    /**
     * Get rankNps2Ytd
     *
     * @return string 
     */
    public function getRankNps2Ytd()
    {
        return $this->rankNps2Ytd;
    }

    /**
     * Set rankNpes2Ytd
     *
     * @param string $rankNpes2Ytd
     * @return KpiMonth
     */
    public function setRankNpes2Ytd($rankNpes2Ytd)
    {
        $this->rankNpes2Ytd = $rankNpes2Ytd;

        return $this;
    }

    /**
     * Get rankNpes2Ytd
     *
     * @return string 
     */
    public function getRankNpes2Ytd()
    {
        return $this->rankNpes2Ytd;
    }
}
