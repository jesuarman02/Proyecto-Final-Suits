<section class="services">
  <div class="container">
    <h2 class="section-title">Conoce Nuestros Servicios</h2>
    <p class="section-subtitle">
      ¡Tu salud es lo más importante! ¡Ven y conócenos!
    </p>
    <div class="service-cards">
      <div class="card">
        <div class="icon-container">
          <div class="icon icon-1"></div>
        </div>
        <h3 class="card-title">Medicina General: </h3>
        <p class="card-text">
          Este es el punto de partida para muchos pacientes. Aquí se atienden enfermedades comunes, se realizan chequeos médicos de rutina y se dan recomendaciones generales para mantener una buena salud.
        </p>
      </div>
      <div class="card">
        <div class="icon-container">
          <div class="icon icon-2"></div>
        </div>
        <h3 class="card-title">Pediatría: </h3>
        <p class="card-text">
          Especializada en la atención de niños, desde recién nacidos hasta adolescentes. Los pediatras se encargan de las vacunas, el crecimiento y desarrollo, y el diagnóstico y tratamiento de enfermedades infantiles.
        </p>
      </div>
      <div class="card">
        <div class="icon-container">
          <div class="icon icon-3"></div>
        </div>
        <h3 class="card-title">Ginecología:</h3>
        <p class="card-text">
          Dirigida a la salud femenina, incluyendo el cuidado prenatal, control de la natalidad, prevención y detección temprana de enfermedades como el cáncer de cuello uterino y de mama.
        </p>
      </div>
    </div>
    <br>
    <div class="service-cards">
      <div class="card">
        <div class="icon-container">
          <div class="icon icon-4"></div>
        </div>
        <h3 class="card-title">Dermatología: </h3>
        <p class="card-text">
          Los dermatólogos se especializan en el diagnóstico y tratamiento de enfermedades de la piel, cabello y uñas. Pueden tratar condiciones como acné, eczema, psoriasis, cáncer de piel y alopecia. </p>
      </div>
      <div class="card">
        <div class="icon-container">
          <div class="icon icon-5"></div>
        </div>
        <h3 class="card-title">Neurología: </h3>
        <p class="card-text">
          Los neurólogos diagnostican y tratan trastornos del sistema nervioso, como la epilepsia, la enfermedad de Parkinson, la esclerosis múltiple y los dolores de cabeza crónicos. </p>
      </div>
      <div class="card">
        <div class="icon-container">
          <div class="icon icon-6"></div>
        </div>
        <h3 class="card-title">Cardiología:</h3>
        <p class="card-text">
          Los cardiólogos se especializan en el diagnóstico y tratamiento de enfermedades del corazón y del sistema circulatorio. Pueden tratar condiciones como la hipertensión, la enfermedad coronaria, las arritmias cardíacas y la insuficiencia cardíaca. </p>
      </div>
    </div>
  </div>
</section>

<section class="departamentos">
    <div class="container">
        <h2 class="section-title">Departamentos</h2>
        <div class="departamentos-wrapper">
            <div class="departamento-list">
                <ul>
                    <li data-department="cardiologia" class="departamento-item" style="color: black;">Cardiología</li>
                    <li data-department="neurologia" class="departamento-item" style="color: black;">Neurología</li>
                    <li data-department="pediatria" class="departamento-item" style="color: black;">Pediatría</li>
                    <li data-department="odontologia" class="departamento-item" style="color: black;">Odontología</li>
                    <li data-department="rehabilitacion" class="departamento-item" style="color: black;">Rehabilitación y Fisioterapia</li>
                </ul>
            </div>
            <div class="departamento-info">
                <p id="departamento-description" class="departamento-description">
                    Nuestro departamento de cardiología te ofrece atención especializada para el cuidado de tu corazón. Contamos con tecnología de punta y un equipo experto que te brindarán un diagnóstico preciso y un tratamiento personalizado. Además, te asesoraremos sobre hábitos saludables para mejorar tu calidad de vida. ¡Tu corazón en las mejores manos!
                </p>
            </div>
            <div class="departamento-image">
                <img id="departamento-image" src="./public/img/cardiologia.jpg" alt="Cardiología" class="departamento-img">
            </div>
        </div>
    </div>
</section>

<script>
    const departamentoItems = document.querySelectorAll('.departamento-item');
    const departamentoDescription = document.getElementById('departamento-description');
    const departamentoImage = document.getElementById('departamento-image');

    const departamentos = {
        cardiologia: {
            description: "Nuestro departamento de cardiología te ofrece atención especializada para el cuidado de tu corazón. Contamos con tecnología de punta y un equipo experto que te brindarán un diagnóstico preciso y un tratamiento personalizado. Además, te asesoraremos sobre hábitos saludables para mejorar tu calidad de vida. ¡Tu corazón en las mejores manos!",
            image: "./public/img/cardiologia.jpg"
        },
        neurologia: {
            description: "En nuestro departamento de neurología, te ofrecemos un cuidado integral para tu salud cerebral. Contamos con un equipo multidisciplinario de especialistas que trabajan en conjunto para diagnosticar y tratar una amplia variedad de trastornos neurológicos, desde dolores de cabeza crónicos hasta enfermedades neurodegenerativas como el Alzheimer y el Parkinson. Además de tratamientos médicos, te brindaremos apoyo psicológico y rehabilitación para mejorar tu calidad de vida.",
            image: "./public/img/neurologia.jpg"
        },
        pediatria: {
            description: "En nuestro departamento de pediatría, los niños son lo primero. Contamos con un equipo de profesionales altamente capacitados y especializados en el cuidado de la salud infantil. Creemos en un ambiente cálido y acogedor donde los niños se sientan seguros y relajados. Ofrecemos una amplia gama de servicios médicos para garantizar el bienestar y el crecimiento saludable de tus hijos.",
            image: "./public/img/pediatria.jpg"
        },
        odontologia: {
            description: "En nuestro departamento de odontología, creemos que una sonrisa saludable es el mejor accesorio. Ofrecemos una amplia gama de servicios dentales, desde limpiezas regulares hasta tratamientos más complejos. Nuestro objetivo principal es prevenir enfermedades bucales y ayudarte a mantener una sonrisa radiante durante toda tu vida.",
            image: "./public/img/odontologia.jpg"
        },
        rehabilitacion: {
            description: "Nuestro departamento de rehabilitación y fisioterapia te ayuda a recuperar tu movilidad y bienestar. Ofrecemos tratamientos personalizados para una amplia variedad de condiciones, desde lesiones deportivas hasta enfermedades crónicas. Nuestro objetivo es ayudarte a alcanzar tu máximo potencial y mejorar tu calidad de vida.",
            image: "./public/img/fisioterapia.jpg"
        }
    };

    departamentoItems.forEach(item => {
        item.addEventListener('click', () => {
            const department = item.getAttribute('data-department');
            departamentoDescription.textContent = departamentos[department].description;
            departamentoImage.src = departamentos[department].image;
        });
    });
</script>