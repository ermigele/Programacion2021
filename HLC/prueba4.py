class Vehiculo():
    def __init__(self, color, ruedas):
        self.color = color
        self.ruedas = ruedas
    
    def __str__(self):
            return "Color: "+self.color+" Ruedas: "+str(self.ruedas)

class Coche(Vehiculo):
    def __init__(self, color, ruedas, velocidad, cilindrada):
        super().__init__(color, ruedas)
        self.velocidad = velocidad
        self.cilindrada = cilindrada
    
    def __str__(self):
            return super().__str__()+" Velocidad: "+str(self.velocidad)+" Cilindrada: "+str(self.cilindrada)
    
    
c = Coche("azul", 4, 140, 1200)
print(c)

class Bicicleta(Vehiculo):
    def __init__(self, color, ruedas, tipo):
        super().__init__(color, ruedas)
        self.tipo = tipo
    
    def __str__(self):
        return super().__str__() + " Tipo: "+self.tipo

class Motocicleta(Bicicleta):
    def __init__(self, color, ruedas, tipo, velocidad, cilindrada):
        super().__init__(color, ruedas, tipo)
        self.velocidad = velocidad
        self.cilindrada = cilindrada
    
    def __str__(self):
        return super().__str__()+" Velocidad: "+str(self.velocidad)+" Cilindrada: "+str(self.cilindrada)

class Camioneta(Coche):
    def __init__(self, color, ruedas, velocidad, cilindrada, carga):
        super().__init__(color, ruedas, velocidad, cilindrada)
        self.carga = carga
    
    def __str__(self):
            return super().__str__()+" Carga: "+str(self.carga)

def catalogar():
    for v in Vehiculos:
        print(v)
        
print(catalogar())
