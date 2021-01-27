class Electrodomestisco():
    def __init__(self, nombre, anioFabricacion, estado=False):
        self.nombre = nombre
        self.anioFabricacion = anioFabricacion
        self.estado = estado
        
    def encender(self):
        if self.estado:
            return "Ya estaba encendido"
        else:
            self.estado=True
            return "El electrodomestico con nombre: "+self.nombre+" se ha encendido"
    
    def apagar(self):
        if self.estado:
            return "Ya está apagado"
        else:
            self.estado=False
            return "El electrodomestico con nombre: "+self.nombre+" se ha apagado"   
        
    def __str__(self):
        return "Nombre: "+self.nombre+" Año de fabricacion: "+str(self.anioFabricacion)
    
class Telefono():
    def llamar(self):
        return "Llamando...."
    
    def colgar(self):
        return "Colgando...."
    
class Television(Electrodomestisco):
    def __init__(self, numPulgadas):
        super().__init__(nombre, anioFabricacion, estado=False)
        self.__numPulgadas = numPulgadas
    
    def cambiarCanal(self):
        if self.estado:
            return "Cambiado de canal..."
    
    def __str__(self):
        return "Nombre: "+self.nombre+" Pulgadas: "+str(self.__numPulgadas)+" Año de fabricacion: "+str(self.anioFabricacion)

class Movil(Electrodomestisco, Telefono):
    def __init__(self, sistemaOp):
        super().__init__(nombre, anioFabricacion, estado=False)
        self.__sistemaOp = sistemaOp
    
    def mandarMensaje(self):
        if self.estado:
            return "Mensaje Enviado..."
    
    def mostrarSistemaOperativo(self):
        return self.__sistemaOp
    
    def __str__(self):
        return "Nombre: "+self.nombre+" Pulgadas: "+str(self.__numPulgadas)+" Año de fabricacion: "+str(self.anioFabricacion)

print("hola")
e1 = Electrodomestisco("lavadora", 2010)

print(e1)