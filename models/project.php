<?php 
    require_once 'db.php';
    
    function getlatestProjects($limit = 3) {
        $conn = getConnection();
        $stmt = $conn->prepare("SELECT * FROM projects ORDER BY date_creation DESC LIMIT :limit");  
        
        $stmt->bindParam(':limit', $limit , PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchall();
        return $result;
    }

    function getProjectById($id) {
        $conn = getConnection();
        $stmt = $conn->prepare("SELECT * FROM projects WHERE id = ?");
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function getProjectCountByUserId($userId) {
        $conn = getConnection();
        $stmt = $conn->prepare("SELECT COUNT(*) FROM projects WHERE user_id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetchColumn();
    }

    

    function get3ProjectsByUserId($userId) {
        $conn = getConnection();
        $stmt = $conn->prepare("SELECT * FROM projects WHERE user_id = ? order by date_creation desc limit 3" );
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } 

    function get3ContributionsByUserId($userId) {
        $conn = getConnection();
        $stmt = $conn->prepare("SELECT members.*, projects.* FROM members Join projects ON members.project_id = projects.id WHERE members.user_id = ? and members.statut = 'accepté' order by date_creation desc limit 3" );
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getProfileProjectPagination($userId,$limit,$offset){
        $conn = getConnection();
        $stmt = $conn->prepare("SELECT * FROM projects WHERE user_id = :user_id ORDER BY date_creation DESC LIMIT :limit OFFSET :offset");
        $stmt->bindParam(":user_id", $userId, PDO::PARAM_INT);
        $stmt->bindParam(":limit", $limit, PDO::PARAM_INT);
        $stmt->bindParam(":offset", $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }


    function getSavedCountByUserId($userID){
        $conn = getConnection();
        $stmt = $conn->prepare("SELECT count(*) FROM saved_projects WHERE user_id = ?");
        $stmt->execute([$userID]);
        return $stmt->fetchColumn();
    }


    function InsertProject($userID,$title,$description,$imagePath,$nmbre){
        $pdo = getConnection();
        $stmt = $pdo->prepare("INSERT INTO projects (titre, description , image , user_id, membres_voulus) VALUES (?,?,?,?,?)");
        return $stmt->execute([$title, $description , $imagePath , $userID, $nmbre]);
        }

    function DeleteProject($ProjectId){
        $conn = getConnection();
        $stmt = $conn->prepare("DELETE FROM projects WHERE id = ?");
        return $stmt->execute([$ProjectId]);
    }

    function CheckifOwner($ProjectId,$userID){
        $conn = getConnection();
        $stmt = $conn->prepare("SELECT count(*) FROM projects WHERE id = ? AND user_id = ?");
        $stmt->execute([$ProjectId, $userID]);
        return $stmt->fetchColumn() > 0;
    }

 
    



    function GetCompencenties(){
        $conn = getConnection();
        $stmt = $conn->prepare("SELECT * FROM `competencies`");
        $stmt->execute();
        return $stmt->fetchAll();

    }




?>