class Persona:
    def __init__():
        self.nombre = ""
        self.edad = ""
        self.dni = ""

    def __init__(self, nombre, edad, dni):
        self.nombre = nombre
        self.edad = edad
        self.dni = dni

    def getNombre(self):
        return self.nombre

    def getEdad(self):
        return self.edad

    def getDni(self):
        return self.dni

    def setNombre(self, nombre):
        self.nombre = nombre

    def setEdad(self, edad):
        if edad >= 0:
            self.edad = edad

    def setDni(self, dni):
        self.dni = dni

    def mostrar():
        print(self.nombre)
        print(self.edad)
        print(self.dni)

    def esMayorDeEdad():
        if(self.edad > 18):
            return True
        else:
            return False


p = Persona("juan", 20, "20494268G")

print(p.mostrar())
