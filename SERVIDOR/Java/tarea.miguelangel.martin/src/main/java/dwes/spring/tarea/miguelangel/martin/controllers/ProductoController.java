package dwes.spring.tarea.miguelangel.martin.controllers;

import java.util.Date;

import javax.validation.Valid;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.core.io.Resource;
import org.springframework.data.repository.query.Param;
import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.ResponseBody;
import org.springframework.web.multipart.MultipartFile;
import org.springframework.web.servlet.mvc.method.annotation.MvcUriComponentsBuilder;

import dwes.spring.tarea.miguelangel.martin.modelos.Producto;
import dwes.spring.tarea.miguelangel.martin.servicios.ProductoServicio;
import dwes.spring.tarea.miguelangel.martin.upload.storage.StorageService;

@Controller
public class ProductoController {

	@Autowired
	private ProductoServicio servicio;

	@Autowired
	private StorageService storageService;

	@GetMapping({ "/", "productos" })
	public String listado(Model model, @Param("buscar") String buscar) {
		model.addAttribute("buscar", buscar);
		if (buscar == null) {
			model.addAttribute("productos", servicio.findAll());
		} else {
			model.addAttribute("productos", servicio.BuscarProductoPorNombreoDescripcion(buscar));
		}
		return "listado";
	}

	@GetMapping("/producto/detalle/{id}")
	public String detalle(@PathVariable long id, Model model) {
		Producto p = servicio.findById(id);
		model.addAttribute("producto", p);
		return "detalle";
	}

	@GetMapping("producto/{id}/comprar")
	public String comprar(@PathVariable long id, Model model) {
		Producto p = servicio.findById(id);
		int unidades = p.getUnidades() - 1;
		p.setUnidades(unidades);
		servicio.save(p);
		model.addAttribute("producto", p);
		return "compraFinalizada";
	}

	@GetMapping("/producto/borrar/{id}")
	public String borrar(@PathVariable long id) {
		Producto p = servicio.findById(id);
		servicio.delete(p);
		return "redirect:/productos";
	}

	@GetMapping("/upload-dir/{filename:.+}")
	@ResponseBody
	public ResponseEntity<Resource> serveFile(@PathVariable String filename) {
		Resource file = storageService.loadAsResource(filename);
		return ResponseEntity.ok().body(file);
	}

	@GetMapping("/producto/new")
	public String nuevoProducto(Model model) {
		model.addAttribute("productoForm", new Producto());
		return "formulario";
	}

	@PostMapping("/producto/new/submit")
	public String enviarNuevoProducto(@Valid @ModelAttribute("productoForm") Producto nuevoProducto,
			BindingResult bindingResult, @RequestParam("file") MultipartFile file) {

		if (bindingResult.hasErrors()) {
			return "formulario";
		} else {
			if (!file.isEmpty()) { // Lógica de almacenamiento del fichero
				Date date = new Date();
				long timeMilli = date.getTime();
				String imagen = storageService.store(file, timeMilli);
				nuevoProducto.setImagen(MvcUriComponentsBuilder
						.fromMethodName(ProductoController.class, "serveFile", imagen).build().toUriString());
			}
			servicio.save(nuevoProducto);
			return "redirect:/productos";
		}
	}

	@GetMapping("/producto/edit/{id}")
	public String editarProducto(@PathVariable long id, Model model) {
		Producto p = servicio.findById(id);
		if (p != null) {
			model.addAttribute("productoForm", p);
			return "formulario";
		} else {
			return "redirect:/producto/new";
		}
	}

	@PostMapping("/producto/edit/submit")
	public String enviarProductoEditar(@Valid @ModelAttribute("empleadoForm") Producto producto,
			@RequestParam("file") MultipartFile file, BindingResult bindingResult) {

		if (bindingResult.hasErrors()) {
			return "formulario";
		} else {
			if (!file.isEmpty()) { // Lógica de almacenamiento del fichero
				Date date = new Date();
				long timeMilli = date.getTime();
				String imagen = storageService.store(file, timeMilli);
				producto.setImagen(MvcUriComponentsBuilder
						.fromMethodName(ProductoController.class, "serveFile", imagen).build().toUriString());
			}
			servicio.edit(producto);
			return "redirect:/productos";
		}
	}
}
