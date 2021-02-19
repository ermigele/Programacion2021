from django.db import models

# Create your models here.

class Pais(models.Model):
    nombre = models.CharField(max_length=200)
    slug = models.SlugField()
    poblacion = models.IntegerField()
    
    class Meta:
        verbose_name_plural = "paises"
    
    def __str__(self):
        return self.nombre

class Ciudad(models.Model):
    nombre = models.CharField(max_length=100)
    slug = models.SlugField()
    foto = models.ImageField(upload_to='mediafiles/')
    descripcion = models.TextField()
    activa = models.BooleanField(default=True)
    pais = models.ForeignKey(Pais, on_delete=models.CASCADE)
    
    class Meta:
        verbose_name_plural = "ciudades"
    
    def __str__(self):
        return self.nombre
  
