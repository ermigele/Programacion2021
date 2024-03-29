<!-- Sidebar Widgets Column - ->
<div class = "col-md-4" >

<!-- Search Widget - ->
<div class = "card my-4" >
<h5 class = "card-header" > Búsqueda < /h5 >
<form class = "card-body" action = "" method = "GET"

role = "search" >

<div class = "input-group" >
<label >
<input type = "text" class = "form-control"

placeholder = "Búsqueda por..." name = "q" >

</label >
<span class = "input-group-btn" >
<button class = "btn btn-secondary"

type = "submit" > Ir < /button >
</span >
</div >
</form >
</div >

<!-- Categories Widget - ->
<div class = "card my-4" >
<h5 class = "card-header" > Categorías < /h5 >
<div class = "card-body" >
<div class = "row" >
<div class = "col-lg-6" >
<ul class = "list-unstyled mb-0" >
{% for category in categories % }
<li >
<a href ="{% url 'category'

            category.slug % }"> {{category.name }} < /a >

</li >
{% endfor % }
</ul >
</div > </div >
</div >
</div >

<!-- Tags Widget - ->
<div class = "card my-4" >
<h5 class = "card-header" > Etiquetas < /h5 >
<div class = "card-body" >
<div class = "row" >
<div class = "col-lg-6" >
<ul class = "list-unstyled mb-0" >
{% for tag in tags % }
<li >
<a href ="{% url 'tag' tag.slug

            % }"> {{tag.name }} < /a >

</li >
{% endfor % }
</ul >
</div >
</div >
</div >
</div >

</div >
