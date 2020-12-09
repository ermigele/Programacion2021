frase = "Este año mi amigo Juan cursa un ciclo superior"

abc = dict()
abc = {" ": 0, "A": 1, "B": 2, "C": 3, "D": 4, "E": 5, "F": 6, "G": 7, "H": 8, "I": 9, "J": 10, "K": 11, "L": 12, "M": 13,
       "N": 14, "Ñ": 15, "O": 16, "P": 17, "Q": 18, "R": 19, "S": 20, "T": 21, "U": 22, "V": 23, "W": 24, "X": 25, "Y": 26, "Z": 27}

frase = frase.upper()
fraseCodi = ""
separador = ""
for caracter in frase:
    fraseCodi += str(separador) + str(abc[caracter])
    separador = "-"

print(fraseCodi)
## with open('./ejercicio5.txt', mode='w', encoding='utf-8') as f:
#    f.write(fraseCodi)
