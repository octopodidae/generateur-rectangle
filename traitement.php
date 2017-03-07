<?php

class Rectangle {

  private $_largeur;
  private $_hauteur;
  private $_couleur;

  public function __construct($params)
  {
    $this->setLargeur($params["largeur"]);
    $this->setHauteur($params["hauteur"]);
    $this->setCouleur($params["couleur"]);

    if ($this->estCarre())
    {
      throw new Exception("Forme carrée non-autorisée <br>");

    }

  }

  public function generateDiv()
  {
    $div = "<div style='background-color: ";
    $div.= $this->getCouleur() . ";";
    $div.= " height: " . $this->getHauteur() . "px;";
    $div.= " width: " . $this->getLargeur() . "px; margin: 10px'>";
    $div.= "</div>";
    return $div;
  }

  public function estCarre() {
    return $this->getHauteur() === $this->getLargeur();
  }

  public function getLargeur()
  {
    return $this->_largeur;
  }

  public function setLargeur($_largeur)
  {
    $this->_largeur = $_largeur;

    return $this;
  }

  public function getHauteur()
  {
    return $this->_hauteur;
  }

  public function setHauteur($_hauteur)
  {
    $this->_hauteur = $_hauteur;

    return $this;
  }

  public function getCouleur()
  {
    return $this->_couleur;
  }

  public function setCouleur($_couleur)
  {
    if ($_couleur === "random") {
      $tabCouleur = ["red", "blue", "green", "orange", "purple"];
      $indexCouleur = rand(0, sizeof($tabCouleur) - 1);
      $this->_couleur = $tabCouleur[$indexCouleur];
      return $this;
    }
    $this->_couleur = $_couleur;

    return $this;
  }

}

?>

<?php

// echo "<pre>";
// var_dump($_POST);
// echo "<pre>";
$nb = $_POST["nombre"];
for ($i=0; $i<$nb; $i++) {
  try {
    $rectangle = new Rectangle($_POST);;
    echo $rectangle->generateDiv();
  }
  catch (Exception $e)  {
    echo $e->getMessage();
    break;
  }
}




?>
