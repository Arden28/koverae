<?php

namespace Modules\Sales\Services;

use Modules\Sales\Entities\SalesTeam;

class SalesTeamService
{
    public function storeTeam($data)
    {
        return SalesTeam::create([
            'company_id' => $data['company_id'],
            'name' => $data['name'],
            'team_leader_id' => $data['team_leader_id'],
            'email_alias' => $data['alias'].'@'.$data['domain_email'],
            'invoice_target' => $data['invoice_target'],
        ]);
    }
}