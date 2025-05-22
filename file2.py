# EX 1
n = int(input("Enter a number: "))
for i in range(1, n + 1):
    if i % 2 == 0:
        print(i)

# EX 2
lst = [1, 2, 3, 4, 5]
i = 0
s = 0
while i < len(lst):
    s += lst[i]
    i += 1
print("Sum:", s)

# EX 3
nums = []
for i in range(5):
    x = int(input("Number: "))
    nums.append(x)
for x in nums:
    if x % 3 == 0:
        print(x)

# EX 4
total = 0
coef_sum = 0
for i in range(5):
    note = float(input("Note: "))
    coef = float(input("Coef: "))
    total += note * coef
    coef_sum += coef
print("Avg:", total / coef_sum)

# EX 5
txt = input("Text: ")
vowels = "aeiouyAEIOUY"
count = 0
for c in txt:
    if c in vowels:
        count += 1
print("Vowels:", count)

# EX 6
nums = []
for i in range(6):
    x = int(input("Number: "))
    nums.append(x)
rev = []
for i in range(len(nums)-1, -1, -1):
    rev.append(nums[i])
print("Reversed:", rev)

# EX 7
names = ["anna", "bob", "leo", "mia", "zoe", "tom"]
target = input("Name to remove: ")
new_list = []
for name in names:
    if name != target:
        new_list.append(name)
print("Updated list:", new_list)

# EX 8
word = input("Word: ")
is_pal = True
for i in range(len(word) // 2):
    if word[i] != word[-(i + 1)]:
        is_pal = False
        break
print("Palindrome:", is_pal)

# EX 9
list1 = []
list2 = []
for i in range(5):
    list1.append(int(input("List1 num: ")))
for i in range(5):
    list2.append(int(input("List2 num: ")))
merged = []
for x in list1 + list2:
    if x not in merged:
        merged.append(x)
print("Merged:", merged)

# EX 10
txt = input("Text: ")
words = txt.split()
shortest = words[0]
for w in words:
    if len(w) < len(shortest):
        shortest = w
letters = 0
for c in txt:
    if c != ' ':
        letters += 1
print("Words:", len(words))
print("Shortest word:", shortest)
print("Letters (no spaces):", letters)
