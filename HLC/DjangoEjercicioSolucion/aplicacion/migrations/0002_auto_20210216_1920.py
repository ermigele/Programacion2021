# Generated by Django 3.1.6 on 2021-02-16 18:20

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('aplicacion', '0001_initial'),
    ]

    operations = [
        migrations.RemoveField(
            model_name='centro',
            name='descripcion',
        ),
        migrations.AddField(
            model_name='centro',
            name='direccion',
            field=models.CharField(default='', max_length=255),
        ),
    ]