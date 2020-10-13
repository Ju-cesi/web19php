<?php
namespace src\Model;

class Categorie {
    private $Id_cat;
    private $Libelle;
    private $Icone;


    public function SqlAdd(\PDO $bdd){
        try {
            $requete = $bdd->prepare("INSERT INTO categories (Libelle, Icone) VALUES(:Libelle, :Icone)");

            $requete->execute([
              "Libelle" => $this->getLibelle(),
              "Icone" => $this->getIcone(),
          ]);
            return $bdd->lastInsertId();
        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * Récupère toutes les catégories
     * @param \PDO $bdd
     * @return array
     */
    public function SqlGetAll(\PDO $bdd){
        $requete = $bdd->prepare("SELECT * FROM categories");
        $requete->execute();
        $datas =  $requete->fetchAll(\PDO::FETCH_CLASS,'src\Model\Categorie');
        return $datas;
    }

    public function SqlGetById(\PDO $bdd, $Id){
        $requete = $bdd->prepare("SELECT * FROM categories WHERE Id_cat=:Id");
        $requete->execute([
                              "Id" => $Id
                          ]);
        $requete->setFetchMode(\PDO::FETCH_CLASS,'src\Model\Categorie');
        $categorie = $requete->fetch();

        return $categorie;
    }

    public function SqlDeleteById(\PDO $bdd, $Id){
        $requete = $bdd->prepare("DELETE FROM categories WHERE Id_cat=:Id");
        $requete->execute([
                              "Id" => $Id
                          ]);
        return true;
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->Id_cat;
    }

    /**
     * @param mixed $Id
     * @return Categorie
     */
    public function setId($Id)
    {
        $this->Id_cat = $Id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLibelle()
    {
        return $this->Libelle;
    }

    /**
     * @param mixed $Libelle
     * @return Categorie
     */
    public function setLibelle($Libelle)
    {
        $this->Libelle = $Libelle;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIcone()
    {
        return $this->Icone;
    }

    /**
     * @param mixed $Icone
     * @return Categorie
     */
    public function setIcone($Icone)
    {
        $this->Icone = $Icone;
        return $this;
    }
}