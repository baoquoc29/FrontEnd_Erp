<?php
class RewardDisciplineDTO
{
    private string $rewardDisciplineId; 
    private string $form; 
    private string $employeeID; 
    private string $decisionNumber; 
    private DateTime $decisionDate; 
    private string $reason; 
    private string $signer;

    public function __construct(array $data)
    {
        $this->rewardDisciplineId = $data['rewardDisciplineId'];
        $this->form = $data['form'];
        $this->employeeID = $data['employeeID'];
        $this->decisionNumber = $data['decisionNumber'];
        $this->decisionDate = new DateTime($data['decisionDate']); 
        $this->reason = $data['reason'];
        $this->signer = $data['signer'];
    }
    public function getRewardDisciplineId(): string
    {
        return $this->rewardDisciplineId;
    }

    public function setRewardDisciplineId(string $rewardDisciplineId): void
    {
        $this->rewardDisciplineId = $rewardDisciplineId;
    }

    public function getForm(): string
    {
        return $this->form;
    }

    public function setForm(string $form): void
    {
        $this->form = $form;
    }

    public function getEmployeeID(): string
    {
        return $this->employeeID;
    }

    public function setEmployeeID(string $employeeID): void
    {
        $this->employeeID = $employeeID;
    }

    public function getDecisionNumber(): string
    {
        return $this->decisionNumber;
    }

    public function setDecisionNumber(string $decisionNumber): void
    {
        $this->decisionNumber = $decisionNumber;
    }

    public function getDecisionDate(): DateTime
    {
        return $this->decisionDate;
    }

    public function setDecisionDate(DateTime $decisionDate): void
    {
        $this->decisionDate = $decisionDate;
    }

    public function getReason(): string
    {
        return $this->reason;
    }

    public function setReason(string $reason): void
    {
        $this->reason = $reason;
    }

    public function getSigner(): string
    {
        return $this->signer;
    }

    public function setSigner(string $signer): void
    {
        $this->signer = $signer;
    }
}
