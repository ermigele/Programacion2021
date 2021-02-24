package dwes.spring.tarea.miguelangel.martin.controllers;

import javax.validation.Valid;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.core.io.Resource;
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
	public String listado(Model model) {
		model.addAttribute("productos", servicio.findAll());
		return "listado";
	}

	@GetMapping("/producto/detalle/{id}")
	public String detalle(@PathVariable long id, Model model) {
		Producto p = servicio.findById(id);
		model.addAttribute("producto", p);
		return "detalle";
	}
	
	@GetMapping("producto/comprar/{id}")
	public String comprar(@PathVariable long id, Model model) {
		Producto p = servicio.findById(id);
		int unidades = p.getUnidades() - 1;
		p.setUnidades(unidades);
		servicio.save(p);
		//te dirige a un página donde pone "Gracias por comprar el producto tal y precio tal
		model.addAttribute("producto", p);
		return "compraFinalizada";
	}
	
	@GetMapping("/producto/borrar/{id}")
	public String borrar(@PathVariable long id) {
		Producto p = servicio.findById(id);
		servicio.delete(p);
		
		return "redirect:/productos";
	}
	
	
	@GetMapping("/files/{filename:.+}")
	@ResponseBody
	public ResponseEntity<Resource> serveFile(@PathVariable String filename) {
		Resource file = storageService.loadAsResource(filename);
		return ResponseEntity.ok().body(file);
	}
}

/*
 * @GetMapping({"/", "productos"}) public String listado(Model model){
 * model.addAttribute("productos",servicio.findAll()); return "listado"; }
 * 
 * @GetMapping("/empleado/new") public String nuevoEmpleadoForm(Model model) {
 * model.addAttribute("empleadoForm", new Empleado()); return "formulario"; }
 * 
 * 
 * @PostMapping("/empleado/new/submit") public String
 * nuevoEmpleadoSubmit(@Valid @ModelAttribute("empleadoForm") Empleado
 * nuevoEmpleado, BindingResult bindingResult, @RequestParam("file")
 * MultipartFile file) {
 * 
 * if (bindingResult.hasErrors()) { return "formulario"; } else { if
 * (!file.isEmpty()) { // Lógica de almacenamiento del fichero String avatar =
 * storageService.store(file, nuevoEmpleado.getId());
 * nuevoEmpleado.setImagen(MvcUriComponentsBuilder.fromMethodName(
 * EmpleadoController.class, "serveFile", avatar).build().toUriString()); }
 * servicio.add(nuevoEmpleado); return "redirect:/empleado/listado"; } }
 * 
 * @GetMapping("/empleado/edit/{id}") public String
 * editarEmpleadoForm(@PathVariable long id, Model model) { Empleado empleado =
 * servicio.findById(id); if (empleado!=null) {
 * model.addAttribute("empleadoForm", empleado); return "formulario"; }else {
 * return "redirect:/empleado/new"; } }
 * 
 * @PostMapping("/empleado/edit/submit") public String
 * editarEmpleadoSubmit(@Valid @ModelAttribute("empleadoForm") Empleado
 * empleado, BindingResult bindingResult) { if (bindingResult.hasErrors()) {
 * return "formulario"; } else { servicio.edit(empleado); return
 * "redirect:/empleado/listado"; }
 * 
 * }
 */

