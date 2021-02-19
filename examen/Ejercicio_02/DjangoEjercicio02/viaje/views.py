from django.shortcuts import render
from .models import Pais, Ciudad

# Create your views here.

def home(request):
    ciudades = Ciudad.objects.filter(activa=True)
    paises = Pais.objects.all()
    return render(request, 'viaje/home.html', {'ciudades': ciudades, 'paises': paises,})
    
def pais(request, slug):
    pais = Pais.objects.get(slug=slug)
    return render(request, 'viaje/pais.html', {'pais': pais})
    
def busqueda(request):
    pass
    
