/* Nature Travel Interactive Background Animation */
(function () {
  const canvas = document.createElement('canvas');
  canvas.id = 'natureBg';
  canvas.style.cssText =
    'position:fixed;top:0;left:0;width:100%;height:100%;z-index:0;pointer-events:none;';
  document.body.prepend(canvas);

  const ctx = canvas.getContext('2d');
  let W, H, mouse = { x: -999, y: -999 };
  let particles = [];
  let ripples = [];
  let floatingLeaves = [];

  function resize() {
    W = canvas.width = window.innerWidth;
    H = canvas.height = window.innerHeight;
  }
  window.addEventListener('resize', resize);
  resize();

  // Track mouse
  document.addEventListener('mousemove', function (e) {
    mouse.x = e.clientX;
    mouse.y = e.clientY;
  });
  document.addEventListener('click', function (e) {
    ripples.push({ x: e.clientX, y: e.clientY, r: 0, alpha: 0.4 });
  });

  // ---- Floating Leaf Particles ----
  const leafColors = ['#4a8a4a', '#6aad6a', '#7cb87c', '#8cc88c', '#5da05d'];
  class Leaf {
    constructor() {
      this.reset();
      this.y = Math.random() * H;
    }
    reset() {
      this.x = Math.random() * W;
      this.y = -20;
      this.size = 4 + Math.random() * 6;
      this.speedY = 0.3 + Math.random() * 0.8;
      this.speedX = -0.3 + Math.random() * 0.6;
      this.rotation = Math.random() * Math.PI * 2;
      this.rotSpeed = (-0.5 + Math.random()) * 0.02;
      this.wobbleAmp = 20 + Math.random() * 30;
      this.wobbleSpeed = 0.01 + Math.random() * 0.02;
      this.wobbleOffset = Math.random() * Math.PI * 2;
      this.color = leafColors[Math.floor(Math.random() * leafColors.length)];
      this.alpha = 0.4 + Math.random() * 0.4;
      this.age = 0;
    }
    update() {
      this.age++;
      this.y += this.speedY;
      this.x += this.speedX + Math.sin(this.age * this.wobbleSpeed + this.wobbleOffset) * 0.5;
      this.rotation += this.rotSpeed;

      // Mouse repel
      var dx = this.x - mouse.x;
      var dy = this.y - mouse.y;
      var dist = Math.sqrt(dx * dx + dy * dy);
      if (dist < 120) {
        var force = (120 - dist) / 120;
        this.x += (dx / dist) * force * 3;
        this.y += (dy / dist) * force * 3;
      }

      if (this.y > H + 20 || this.x < -40 || this.x > W + 40) this.reset();
    }
    draw() {
      ctx.save();
      ctx.translate(this.x, this.y);
      ctx.rotate(this.rotation);
      ctx.globalAlpha = this.alpha;
      ctx.fillStyle = this.color;
      ctx.beginPath();
      ctx.ellipse(0, 0, this.size, this.size * 0.45, 0, 0, Math.PI * 2);
      ctx.fill();
      // Leaf vein
      ctx.strokeStyle = 'rgba(255,255,255,0.3)';
      ctx.lineWidth = 0.5;
      ctx.beginPath();
      ctx.moveTo(-this.size * 0.7, 0);
      ctx.lineTo(this.size * 0.7, 0);
      ctx.stroke();
      ctx.restore();
    }
  }

  // ---- Firefly / Butterfly Particles ----
  class Firefly {
    constructor() {
      this.reset();
      this.y = Math.random() * H;
    }
    reset() {
      this.x = Math.random() * W;
      this.y = Math.random() * H;
      this.size = 2 + Math.random() * 2.5;
      this.speedX = (-0.5 + Math.random()) * 0.6;
      this.speedY = (-0.5 + Math.random()) * 0.6;
      this.glowPhase = Math.random() * Math.PI * 2;
      this.glowSpeed = 0.02 + Math.random() * 0.03;
      this.hue = 40 + Math.random() * 30;
      this.alpha = 0;
    }
    update() {
      this.glowPhase += this.glowSpeed;
      this.alpha = 0.3 + Math.sin(this.glowPhase) * 0.3;
      this.x += this.speedX + Math.sin(this.glowPhase * 0.7) * 0.3;
      this.y += this.speedY + Math.cos(this.glowPhase * 0.5) * 0.3;

      // Mouse attract
      var dx = mouse.x - this.x;
      var dy = mouse.y - this.y;
      var dist = Math.sqrt(dx * dx + dy * dy);
      if (dist < 200) {
        var force = (200 - dist) / 200 * 0.02;
        this.x += dx * force;
        this.y += dy * force;
      }

      if (this.x < -20 || this.x > W + 20 || this.y < -20 || this.y > H + 20) this.reset();
    }
    draw() {
      ctx.save();
      ctx.globalAlpha = this.alpha;
      var grad = ctx.createRadialGradient(this.x, this.y, 0, this.x, this.y, this.size * 4);
      grad.addColorStop(0, 'hsla(' + this.hue + ',80%,70%,1)');
      grad.addColorStop(1, 'hsla(' + this.hue + ',80%,70%,0)');
      ctx.fillStyle = grad;
      ctx.beginPath();
      ctx.arc(this.x, this.y, this.size * 4, 0, Math.PI * 2);
      ctx.fill();
      ctx.fillStyle = 'hsla(' + this.hue + ',90%,85%,1)';
      ctx.beginPath();
      ctx.arc(this.x, this.y, this.size * 0.8, 0, Math.PI * 2);
      ctx.fill();
      ctx.restore();
    }
  }

  // ---- Water Ripple Effect ----
  class Ripple {
    constructor(x, y, maxR, alpha) {
      this.x = x;
      this.y = y;
      this.r = 0;
      this.maxR = maxR || 80 + Math.random() * 60;
      this.alpha = alpha || 0.3;
    }
    update() {
      this.r += 1.2;
      this.alpha -= 0.003;
    }
    draw() {
      if (this.alpha <= 0) return;
      ctx.save();
      ctx.globalAlpha = this.alpha;
      ctx.strokeStyle = 'rgba(255,255,255,0.6)';
      ctx.lineWidth = 1.5;
      ctx.beginPath();
      ctx.arc(this.x, this.y, this.r, 0, Math.PI * 2);
      ctx.stroke();
      // Second ring
      if (this.r > 15) {
        ctx.globalAlpha = this.alpha * 0.5;
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.r * 0.6, 0, Math.PI * 2);
        ctx.stroke();
      }
      ctx.restore();
    }
  }

  // ---- Cloud Drift (subtle) ----
  class Cloud {
    constructor() {
      this.x = Math.random() * W;
      this.y = 20 + Math.random() * H * 0.25;
      this.w = 100 + Math.random() * 200;
      this.h = 20 + Math.random() * 30;
      this.speed = 0.1 + Math.random() * 0.15;
      this.alpha = 0.04 + Math.random() * 0.06;
    }
    update() {
      this.x += this.speed;
      if (this.x > W + this.w) this.x = -this.w;
    }
    draw() {
      ctx.save();
      ctx.globalAlpha = this.alpha;
      ctx.fillStyle = '#fff';
      ctx.beginPath();
      ctx.ellipse(this.x, this.y, this.w * 0.5, this.h * 0.5, 0, 0, Math.PI * 2);
      ctx.fill();
      ctx.beginPath();
      ctx.ellipse(this.x - this.w * 0.25, this.y + 5, this.w * 0.3, this.h * 0.35, 0, 0, Math.PI * 2);
      ctx.fill();
      ctx.beginPath();
      ctx.ellipse(this.x + this.w * 0.3, this.y + 3, this.w * 0.25, this.h * 0.3, 0, 0, Math.PI * 2);
      ctx.fill();
      ctx.restore();
    }
  }

  // Init objects
  for (var i = 0; i < 15; i++) particles.push(new Leaf());
  for (var i = 0; i < 12; i++) particles.push(new Firefly());
  for (var i = 0; i < 4; i++) floatingLeaves.push(new Cloud());

  // Parallax on mouse move (background image)
  var bgEl = null;
  function getBg() {
    if (!bgEl) bgEl = document.querySelector('.login-bg');
    return bgEl;
  }

  // Main loop
  function animate() {
    ctx.clearRect(0, 0, W, H);

    // Update & draw clouds
    floatingLeaves.forEach(function (c) {
      c.update();
      c.draw();
    });

    // Update & draw particles
    particles.forEach(function (p) {
      p.update();
      p.draw();
    });

    // Update & draw ripples
    ripples = ripples.filter(function (r) { return r.alpha > 0; });
    ripples.forEach(function (r) {
      r.update();
      r.draw();
    });

    // Parallax effect on background
    var bg = getBg();
    if (bg) {
      var px = (mouse.x / W - 0.5) * 15;
      var py = (mouse.y / H - 0.5) * 10;
      bg.style.transform = 'translate(' + px + 'px,' + py + 'px) scale(1.05)';
    }

    requestAnimationFrame(animate);
  }
  animate();

  // Auto ripple occasionally
  setInterval(function () {
    if (ripples.length < 5) {
      ripples.push(new Ripple(
        100 + Math.random() * (W - 200),
        100 + Math.random() * (H - 200),
        40 + Math.random() * 40,
        0.15
      ));
    }
  }, 2500);

  // Mouse trail ripple throttle
  var lastRipple = 0;
  document.addEventListener('mousemove', function (e) {
    var now = Date.now();
    if (now - lastRipple > 400 && ripples.length < 8) {
      ripples.push(new Ripple(e.clientX, e.clientY, 30, 0.2));
      lastRipple = now;
    }
  });
})();
