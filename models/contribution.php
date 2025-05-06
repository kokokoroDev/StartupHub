<?php
    require_once 'db.php';

    function CheckIFContribution($ProjectID, $userID){
        $conn = getConnection();
        $stmt = $conn->prepare("SELECT count(*) FROM members WHERE user_id = ? and project_id = ?");
        $stmt->execute([$userID, $ProjectID]);
        return $stmt->fetchColumn() > 0;
    }


    function getContributionsCountByUserId($userId){
        $conn = getConnection();
        $stmt = $conn->prepare("SELECT count(*) FROM members WHERE user_id = ? and statut = 'accepté'");
        $stmt->execute([$userId]);
        return $stmt->fetchColumn();
    }


    function GetMembersByProjectID($ProjectId){
        $conn = getConnection();
        $stmt = $conn->prepare("SELECT count(*) FROM members where project_id = ? AND statut = 'accepté'");
        $stmt->execute([$ProjectId]);
        return $stmt->fetchColumn();
    }



    function getContributionPagination($userId,$limit,$offset){
        $conn = getConnection();
        $stmt = $conn->prepare("SELECT m.*, p.date_creation FROM members m JOIN projects p ON p.id = m.project_id WHERE m.user_id = :user_id and m.statut = 'accepté' ORDER BY date_creation DESC LIMIT :limit OFFSET :offset");
        $stmt->bindParam(":user_id", $userId, PDO::PARAM_INT);
        $stmt->bindParam(":limit", $limit, PDO::PARAM_INT);
        $stmt->bindParam(":offset", $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function GetContributionStatus($ProjectID,$userID){
        $conn = getConnection();
        $stmt = $conn->prepare("SELECT statut FROM members WHERE user_id = ? and project_id = ?");
        $stmt->execute([$userID, $ProjectID]);
        $results = $stmt->fetch();
        return $results;
    }

    function Contribute($ProjectID,$userID){
        $conn = getConnection();
        $stmt = $conn->prepare("INSERT INTO members (user_id, project_id) VALUES (?, ?)");
        return $stmt->execute([$userID, $ProjectID]);
    }

    function GetMembersList($ProjectID){
        $conn = getConnection();
        $stmt = $conn->prepare("SELECT m.*, u.nom, u.prenom, u.profile_picture FROM members m JOIN users u ON u.id = m.user_id WHERE m.project_id = ? AND m.statut = 'accepté'");
        $stmt->execute([$ProjectID]);
        $results = $stmt->fetchAll();
        return $results;
    }

    function GetContributionRequestList($ProjectID){
        $conn = getConnection();
        $stmt = $conn->prepare("SELECT m.* , u.nom , u.prenom , u.profile_picture FROM members m JOIN users u ON u.id = m.user_id WHERE m.project_id = ? AND m.statut NOT IN ('accepté','refusé')");
        $stmt->execute([$ProjectID]);
        $results = $stmt->fetchAll();
        return $results;
    }

    function UpdateMemberStatus($ProjectID,$userID,$action){
        $conn = getConnection();
        $stmt = $conn->prepare("UPDATE members SET statut = ? WHERE user_id = ? AND project_id = ?");
        return $stmt->execute([$action,$userID,$ProjectID]);
    }




?>