<?php
class Stagiaire {
    private string $nom;
    private array $notes;
    // Constructeur
    public function __construct(string $nom, array $notes) {
        $this->nom = $nom;
        $this->notes = $notes;
    }
    // Getters
    public function getNom(): string {
        return $this->nom;
    }
    public function getNotes(): array {
        return $this->notes;
    }
    // Setters
    public function setNom(string $nom): void {
        $this->nom = $nom;
    }
    public function setNotes(array $notes): void {
        $this->notes = $notes;
    }
    // Calculer moyenne 
    public function calculerMoyenne(): float {
        return array_sum($this->notes) / count($this->notes);
    }
    // Max
    public function getMax(): float {
        return max($this->notes);
    }
    // Min
    public function getMin(): float {
        return min($this->notes);
    }
}

$stagiaire = new Stagiaire("Nom Prenom", [12.5, 15.0, 9.0, 18.5]);
echo "Moyenne: " . $stagiaire->calculerMoyenne() . "<br>";
echo "Note Max: " . $stagiaire->trouverMax() . "<br>";
echo "Note Min: " . $stagiaire->trouverMin() . "<br>";
?>
<!--       Ex 2  -->
<?php
class Formation {
    private string $intitule;
    private int $nbrJours;
    private array $stagiaires;

    // Constructeur
    public function __construct(string $intitule, int $nbrJours, array $stagiaires) {
        $this->intitule = $intitule;
        $this->nbrJours = $nbrJours;
        $this->stagiaires = $stagiaires;
    }
    // Getters
    public function getIntitule(): string {
        return $this->intitule;
    }
    public function getNbrJours(): int {
        return $this->nbrJours;
    }
    public function getStagiaires(): array {
        return $this->stagiaires;
    }
    // Setters
    public function setIntitule(string $intitule): void {
        $this->intitule = $intitule;
    }
    public function setNbrJours(int $nbrJours): void {
        $this->nbrJours = $nbrJours;
    }
    public function setStagiaires(array $stagiaires): void {
        $this->stagiaires = $stagiaires;
    }
    // Calculer la moyenne de la formation
    public function calculerMoyenneFormation(): float {
        $total = 0;
        $count = count($this->stagiaires);
        if ($count === 0) return 0.0;
        foreach ($this->stagiaires as $stagiaire) {
            $total += $stagiaire->calculerMoyenne();
        }
        return $total / $count;
    }
    // Trouver l'index du stagiaire avec la meilleure moyenne
    public function getIndexMax(): int {
        $maxIndex = 0;
        $maxMoyenne = -1;
        foreach ($this->stagiaires as $index => $stagiaire) {
            $moyenne = $stagiaire->calculerMoyenne();
            if ($moyenne > $maxMoyenne) {
                $maxMoyenne = $moyenne;
                $maxIndex = $index;
            }
        }
        return $maxIndex;
    }
    // Afficher le nom du stagiaire avec la meilleure moyenne
    public function afficherNomMax(): void {
        echo $this->stagiaires[$this->getIndexMax()]->getNom() . "\n";
    }
    // Afficher la note minimale du stagiaire avec la meilleure moyenne
    public function afficherMinMax(): void {
        echo $this->stagiaires[$this->getIndexMax()]->trouverMin() . "\n";
    }
    // Trouver la moyenne d'un stagiaire par son nom
    public function trouverMoyenneParNom(string $nom): void {
        foreach ($this->stagiaires as $stagiaire) {
            if ($stagiaire->getNom() === $nom) {
                echo $stagiaire->calculerMoyenne() . "\n";
                return;
            }
        }
        echo "Stagiaire non trouvé" . "\n";
    }
}

// Exemple d'utilisation dans index.php
$stagiaire1 = new Stagiaire("Jean Dupont", [12.5, 15.0, 9.0, 18.5]);
$stagiaire2 = new Stagiaire("Marie Curie", [14.0, 16.5, 13.0, 19.0]);
$stagiaire3 = new Stagiaire("Albert Einstein", [17.0, 18.0, 16.5, 19.5]);

$formation = new Formation("Physique Avancée", 30, [$stagiaire1, $stagiaire2, $stagiaire3]);

echo "Moyenne de la formation: " . $formation->calculerMoyenneFormation() . "\n";
$formation->afficherNomMax();
$formation->afficherMinMax();
$formation->trouverMoyenneParNom("Marie Curie");
?>
<?php
class Adresse {
    private string $rue;
    private string $ville;
    private string $codePostal;

    public function __construct(string $rue, string $ville, string $codePostal) {
        $this->rue = $rue;
        $this->ville = $ville;
        $this->codePostal = $codePostal;
    }

    public function getRue(): string {
        return $this->rue;
    }

    public function getVille(): string {
        return $this->ville;
    }

    public function getCodePostal(): string {
        return $this->codePostal;
    }

    public function setRue(string $rue): void {
        $this->rue = $rue;
    }

    public function setVille(string $ville): void {
        $this->ville = $ville;
    }

    public function setCodePostal(string $codePostal): void {
        $this->codePostal = $codePostal;
    }
}

class Personne {
    private string $nom;
    private string $sexe;
    private array $adresses;

    public function __construct(string $nom, string $sexe, array $adresses) {
        $this->nom = $nom;
        $this->sexe = $sexe;
        $this->adresses = $adresses;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function getSexe(): string {
        return $this->sexe;
    }

    public function getAdresses(): array {
        return $this->adresses;
    }

    public function setNom(string $nom): void {
        $this->nom = $nom;
    }

    public function setSexe(string $sexe): void {
        $this->sexe = $sexe;
    }

    public function setAdresses(array $adresses): void {
        $this->adresses = $adresses;
    }
}

class ListePersonnes {
    private array $personnes;

    public function __construct(array $personnes = []) {
        $this->personnes = array_slice($personnes, 0, 10);
    }

    public function findByNom(string $s): ?Personne {
        foreach ($this->personnes as $personne) {
            if ($personne->getNom() === $s) {
                return $personne;
            }
        }
        return null;
    }

    public function findByCodePostal(string $cp): bool {
        foreach ($this->personnes as $personne) {
            foreach ($personne->getAdresses() as $adresse) {
                if ($adresse->getCodePostal() === $cp) {
                    return true;
                }
            }
        }
        return false;
    }

    public function countPersonneVille(string $ville): int {
        $count = 0;
        foreach ($this->personnes as $personne) {
            foreach ($personne->getAdresses() as $adresse) {
                if ($adresse->getVille() === $ville) {
                    $count++;
                    break;
                }
            }
        }
        return $count;
    }

    public function editPersonneNom(string $oldNom, string $newNom): void {
        foreach ($this->personnes as $personne) {
            if ($personne->getNom() === $oldNom) {
                $personne->setNom($newNom);
            }
        }
    }

    public function editPersonneVille(string $nom, string $newVille): void {
        foreach ($this->personnes as $personne) {
            if ($personne->getNom() === $nom) {
                foreach ($personne->getAdresses() as $adresse) {
                    $adresse->setVille($newVille);
                }
            }
        }
    }
}

// Test dans index.php
$adresse1 = new Adresse("123 Rue Principale", "Paris", "75000");
$adresse2 = new Adresse("456 Rue Secondaire", "Lyon", "69000");
$personne1 = new Personne("Jean Dupont", "M", [$adresse1]);
$personne2 = new Personne("Marie Curie", "F", [$adresse2]);
$liste = new ListePersonnes([$personne1, $personne2]);

// Tests
echo ($liste->findByNom("Jean Dupont") !== null ? "Trouvé" : "Non trouvé") . "\n";
echo ($liste->findByCodePostal("75000") ? "Code postal trouvé" : "Code postal non trouvé") . "\n";
echo "Personnes à Paris: " . $liste->countPersonneVille("Paris") . "\n";
$liste->editPersonneNom("Jean Dupont", "Jean D.");
echo "Nouveau nom: " . $personne1->getNom() . "\n";
$liste->editPersonneVille("Jean D.", "Marseille");
echo "Nouvelle ville: " . $personne1->getAdresses()[0]->getVille() . "\n";
?>


