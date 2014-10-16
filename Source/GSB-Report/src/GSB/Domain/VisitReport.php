<?php

namespace GSB\Domain;
/**
 * Description of VisitReport
 *
 * @author acrep
 */
class VisitReport {
    /**
     * VisitReport id.
     *
     * @var integer
     */
    private $id;
    
    /**
     * VisitReport reportingDate.
     *
     * @var date
     */
    private $reportingDate;
    
    /**
     * Practitioner id.
     *
     * @var integer
     */
    private $practitionerId;
    
    /**
     * Visitor id.
     *
     * @var integer
     */
    private $visitorId;
    
    /**
     * VisitReport assessment.
     *
     * @var integer
     */
    private $assessment;
    
    /**
     * VisitReport assessment.
     *
     * @var string
     */
    private $purpose;
    
    public function getId() {
        return $this->id;
    }

    public function getReportingDate() {
        return $this->reportingDate;
    }

    public function getPractitionerId() {
        return $this->practitionerId;
    }

    public function getVisitorId() {
        return $this->visitorId;
    }

    public function getAssessment() {
        return $this->assessment;
    }

    public function getPurpose() {
        return $this->purpose;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setReportingDate($reportingDate) {
        $this->reportingDate = $reportingDate;
    }

    public function setPractitionerId($practitionerId) {
        $this->practitionerId = $practitionerId;
    }

    public function setVisitorId($visitorId) {
        $this->visitorId = $visitorId;
    }

    public function setAssessment($assessment) {
        $this->assessment = $assessment;
    }

    public function setPurpose($purpose) {
        $this->purpose = $purpose;
    }
}
