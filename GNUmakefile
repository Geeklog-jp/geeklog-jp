#

FILES=		CHANGES.jp INSTALL db-config.php emailgeeklogstories \
		emailgeeklogstories.en readme readme.ja release_jp.php
DIRS=		backups data language logs plugins sql system

SUBDIR=		custom plugins-jp
ESUBDIR=	extended 

GLDESTDIR?=	$(GLDIR)

PREINSTALL=	pre-install

all:

pre-install:
	$(MKDIR) $(DESTDIR)$(GLDIR)
	$(MKDIR) $(DESTDIR)$(GLPUBDIR)


pre-release:
	@if [ "$(GLDIR)" != "`$(DIRNAME) $(GLPUBDIR)`" ]; then \
		echo "$(GLPUBDIR) should be under $(GLDIR) when making release."; \
		exit 1; \
	fi

install: $(PREINSTALL) install-myfiles install-dirs install-pubdir

release: pre-release install
	cd $(TOPDIR); \
	$(MV) $(GLBASE) $(GL_RELEASE); \
	$(TAR) -c -f - $(GL_RELEASE) | $(GZIP) -9 > $(GL_RELEASE).tar.gz; \
	$(RM) -f $(GL_RELEASE).zip; \
	$(ZIP) -qr $(GL_RELEASE).zip $(GL_RELEASE)

update-release-jp: release_jp.php

release_jp.php: GNUmakefile.common
	@$(SED) -e '/release_no =/s/".*"/"$(GL_JPVERSION)"/' release_jp.php \
		> release_jp.php.tmp; \
	if ${CMP} -s release_jp.php release_jp.php.tmp; then \
		${RM} release_jp.php.tmp; \
		${TOUCH} release_jp.php; \
	else \
		${MV} release_jp.php.tmp release_jp.php; \
	fi; \
	${RM} release_jp.php.tmp

include GNUmakefile.common
