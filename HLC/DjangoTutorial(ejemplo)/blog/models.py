from django.db import models

# Create your models here.
class Test(models.Model):
    text = models.CharField(max_length=100)
    text_area = models.TextField()
    integer = models.IntegerField()
    date = models.DateField()
    boolean = models.BooleanField()
    file = models.FileField(upload_to='files/')

    def __str__(self):
        return self.text

class General(models.Model):   
    nombre = models.CharField(max_length=100)
    descripcion = models.TextField()
    logo = models.FileField(upload_to='files/')

    def __str__(self):
        return self.nombre