# Generated by Django 3.1.6 on 2021-02-09 11:53

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('blog', '0002_general'),
    ]

    operations = [
        migrations.AlterField(
            model_name='general',
            name='logo',
            field=models.ImageField(upload_to='logo/'),
        ),
    ]
