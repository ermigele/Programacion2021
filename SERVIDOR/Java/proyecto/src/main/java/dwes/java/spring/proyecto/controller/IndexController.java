package dwes.java.spring.proyecto.Controller;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ResponseBody;

@Controller
public class IndexController {

	@GetMapping("/")
	@ResponseBody
	public String holaMundo() {
		return "hola mundo";
	}
}
