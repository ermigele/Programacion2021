from django.contrib import admin
from .models import Pais, Ciudad 

# Register your models here.

class PaisAdmin(admin.ModelAdmin):
    prepopulated_fields = {"slug": ("nombre",)}
    list_display = ("nombre","poblacion")
    
class CiudadAdmin(admin.ModelAdmin):
    prepopulated_fields = {"slug": ("nombre",)}

admin.site.register(Pais, PaisAdmin)
admin.site.register(Ciudad, CiudadAdmin)