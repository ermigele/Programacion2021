# Generated by Django 3.1.6 on 2021-02-17 19:42

from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='Centro',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('nombre', models.CharField(max_length=100)),
                ('dirección', models.CharField(default='', max_length=255)),
                ('slug', models.SlugField()),
            ],
        ),
        migrations.CreateModel(
            name='Departamento',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('nombre', models.CharField(max_length=200)),
                ('presupuesto', models.IntegerField()),
                ('slug', models.SlugField()),
                ('centro', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='aplicacion.centro')),
            ],
        ),
    ]