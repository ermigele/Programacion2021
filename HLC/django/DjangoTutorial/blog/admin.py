from django.contrib import admin

from .models import Test, General, Category, Tag, Post

admin.site.register(General)
# Creamos el inline para el modelo Post
class PostInlineCategory(admin.StackedInline):
    model = Post
    max_num = 2
    
class CategoryAdmin(admin.ModelAdmin):
    prepopulated_fields = {"slug": ("name",)}
    inlines = [PostInlineCategory]

class TagAdmin(admin.ModelAdmin):
    prepopulated_fields = {"slug": ("name",)}
    inlines = [PostInlineTag]

class PostAdmin(admin.ModelAdmin):
    prepopulated_fields = {"slug": ("title",)}
    admin.site.register(General)
    admin.site.register(Category, CategoryAdmin)
    admin.site.register(Tag, TagAdmin)
    admin.site.register(Post, PostAdmin)
    
class PostInlineTag(admin.TabularInline):
    model = Post.tag.through
    max_num = 3
    
