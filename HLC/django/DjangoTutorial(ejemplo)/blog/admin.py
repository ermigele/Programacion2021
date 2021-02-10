from django.contrib import admin
from .models import Test
from .models import General

# Register your models here.
class TestAdmin(admin.ModelAdmin):
    date_hierarchy = 'date'
    list_display = ('text', 'integer', 'date', 'boolean')
    list_editable = ('integer', 'boolean')
    ordering = ('text', 'date')
    search_fields = ('text', 'integer')

admin.site.register(Test, TestAdmin)



#
#class GeneralAdmin(admin.ModelAdmin):
#    date_hierarchy = 'date'
#    list_display = ('text', 'integer', 'date', 'boolean')
#    list_editable = ('integer', 'boolean')
 #   ordering = ('text', 'date')
 #   search_fields = ('text', 'integer')

#admin.site.regis