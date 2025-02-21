fruits = ["mangue", "kiwi", "cherimoya"]
print(fruits)
print(fruits[0])
# EX 2
fruits[1] = "mangue"
print(fruits)
# EX 3
animals = ["dog", "horse", "birb", "cat", "helicopter"]
for animal in animals:
    print(animal)
# EX 4
colors = ["white", "black", "blue", "purple"]
usercolor = input("Enter ur color : ")
for color in colors:
    if color == usercolor:
        print("It's in the list.")
        break
else:
    print("It's not in the list.")
# EX 5
nombres = [3, 7, 12, 5, 9, 15, 21]
print("La longueur de liste :", len(nombres))
# EX 6
pays = []
pays.append("Maroc")
pays.append("Canada")
pays.append("Espagne")
print("liste des pays :", pays)

pays.insert(0, "Italie")
print("liste apres insertion :", pays)

pays.pop()
print("liste apres suppression du dernier pays :", pays)
# EX 7
nombres_paires = [2, 4, 6]
nombres_impaires = [1, 3, 5]

nombres_paires.extend(nombres_impaires)

print("liste fusionnee :", nombres_paires)
# EX 8
notes = [1, 2, 3, 5, 4]

notes.sort()
print("Liste triee :", notes)

notes.reverse()
print("Liste inversee :", notes)
 # EX 9
temperatures = [18, 25, 30, 22, 12, 27]

print("Temperature maximale :", max(temperatures))
print("Temperature minimale :", min(temperatures))

noms = ["Marie", "Jean", "Marie", "Paul", "Alice", "Jean", "Chouaib"]

prenom = input("Entrez un prenom : ")

occurrences = noms.count(prenom)

print(f"{prenom} apparait {occurrences} fois dans la liste.")
#---------------TP 4 -------------------------
from collections import namedtuple, deque, Counter, ChainMap, OrderedDict, defaultdict

# EX1
Adherent = namedtuple('Adherent', ['nom', 'age', 'sport'])
adherent1 = Adherent(nom="Chouaib", age=25, sport="Football")
adherent2 = Adherent(nom="Marie", age=30, sport="Tennis")
adherent3 = Adherent(nom="Jean", age=22, sport="Basketball")
print(adherent1)
print(adherent2)
print(adherent3)

# EX2
passagers = deque(["Alice", "Bob", "Charlie"])
passagers.popleft()
passagers.append("David")
print(passagers)

# EX3
produits = ["banane", "pomme", "banane", "orange", "pomme", "pomme", "kiwi", "banane", "orange", "kiwi"]
compteur = Counter(produits)
print(compteur)
print(compteur.most_common(2))

# EX4
config_defaut = {'theme': 'clair', 'langue': 'fr'}
config_utilisateur = {'theme': 'sombre'}
config_finale = ChainMap(config_utilisateur, config_defaut)
print(config_finale)

# EX5
commandes = OrderedDict([("Alice", "Pizza"), ("Bob", "Burger"), ("Charlie", "Sushi")])
print(commandes)
commandes["David"] = "Pasta"
print(commandes)

# EX6
eleves = defaultdict(list)
eleves["Chouaib"].append("Maths")
eleves["Marie"].append("Physique")
eleves["Chouaib"].append("Anglais")
print(eleves)
