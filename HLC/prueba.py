import random

print("DADOS IGUALES")

numero = int(input("Numero de dados: "))

if numero < 2:
    print("Imposible")
else:
    print("Dados:", end=" ")
    repetido = False
    anterior = random.randrange(1, 7)
    print(anterior, end=" ")
    for _ in range(1, numero):
        dado = random.randrange(1, 7)
        print(dado, end=" ")
        if dado == anterior:
            repetido = True
        anterior = dado
    if repetido:
        print("El jugador ha perdido.")
    else:
        print("El jugador ha ganado.")