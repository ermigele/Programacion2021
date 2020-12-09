def realizarOperacion(num1, num2, opc):
    if opc == 1:
        return num1 + num2
    elif opc == 2:
        return num1 - num2
    elif opc == 3:
        return num1 * num2
    elif opc == 4:
        try:
            return num1/num2
        except ZeroDivisionError:
            raise

while True:
    try:
        num1 = int(input("Primer número: "))
        break
    except ValueError:
        print ("Debes introducir un número")

while True:
    try:
        num2 = int(input("Segundo número: "))
        break
    except ValueError:
        print ("Debes introducir un número")

print("Usuario introduce:")
num1 = int(input("Primer número: "))
num2 = int(input("Segundo número: "))
operacion = int(input("Operacion: "))
try:
    print("Resultado", end=" ")
    print(realizarOperacion(num1,num2,operacion))
except:
    print("No se puede dividir los números introducidos")