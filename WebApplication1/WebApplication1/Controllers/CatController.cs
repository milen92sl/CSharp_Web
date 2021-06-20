using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;

namespace WebApplication1.Controllers
{
    public class CatController : Controller
    {
        private readonly IList<CatController> cats;

        public IActionResult CatModel()
        {
            return View();
        }
    }
}
