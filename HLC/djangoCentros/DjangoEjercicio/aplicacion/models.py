from django.db import models

class Centro(models.Model):
    nombre = models.CharField(max_length=100)
    dirección = models.CharField(max_length=255,default="")
    slug = models.SlugField()
    verbose_name_plural = "centros"
    
    def __str__(self):
        return self.nombre
  
class Departamento(models.Model):
    nombre = models.CharField(max_length=200)
    presupuesto = models.IntegerField()
    slug = models.SlugField()
    verbose_name_plural = "Departamentos"
    centro = models.ForeignKey(Centro, on_delete=models.CASCADE)
    
    def __str__(self):
        return self.nombre